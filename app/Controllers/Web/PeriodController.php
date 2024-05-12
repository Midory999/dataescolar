<?php

namespace App\Controllers\Web;

use App\Core\Dependencies;
use App\Core\Session;
use App\Core\UI;
use App\Exceptions\DuplicatedRecordException;
use App\Models\Lapse;
use App\Models\Period;
use App\Repositories\LeafDB\LeafDBLapseRepository;
use App\Repositories\LeafDB\LeafDBPeriodRepository;
use Flight;
use Leaf\Form;

final readonly class PeriodController {
	static function showAll(): void {
		$periods = Dependencies::getPeriodRepository()
			->setLapseRepository(Dependencies::getLapseRepository())
			->ensureThereIsOnePeriod()
			->getAll();

		$title = 'Periodos';
		UI::render('periods/list', compact('periods', 'title'));
	}

	static function showRegisterForm(): void {
		$periods = Dependencies::getPeriodRepository()
			->setLapseRepository(Dependencies::getLapseRepository())
			->ensureThereIsOnePeriod()
			->getAll();

		$title = 'Registrar periodo';
		UI::render('periods/register', compact('periods', 'title'));
	}

	static function register(): void {
		$startYear = Flight::request()->data['inicio'];
		$lapses = Flight::request()->data['lapsos'];

		Form::validate([
			'fecha de inicio' => $startYear,
			'lapsos' => $lapses
		], [
			'fecha de inicio' => 'year',
			'lapsos.primer.inicio' => 'date',
			'lapsos.segundo.inicio' => 'date',
			'lapsos.tercer.inicio' => 'date',
			'lapsos.primer.fin' => 'date',
			'lapsos.segundo.fin' => 'date',
			'lapsos.tercer.fin' => 'date'
		]);

		self::validateLapses($startYear, $lapses);

		// TODO: Garantizar que no existan colisiones de las fechas de inicio y fin de los lapsos

		if (Form::errors()) {
			exit(Flight::redirect('/periodos'));
		}

		try {
			$period = Dependencies::getPeriodRepository()->save(new Period($startYear));

			$lapses = [
				new Lapse('1er Lapso', $lapses['primer']['inicio'], $lapses['primer']['fin'], $period),
				new Lapse('2do Lapso', $lapses['segundo']['inicio'], $lapses['segundo']['fin'], $period),
				new Lapse('3er Lapso', $lapses['tercer']['inicio'], $lapses['tercer']['fin'], $period),
			];

			foreach ($lapses as $lapse) {
				$lapse = Dependencies::getLapseRepository()->save($lapse);
				// TODO: Eliminar el período si ocurre algún error al registrar un lapso
				$period->addLapse($lapse);
			}

			Session::set('success', 'Periodo registrado exitósamente');
			Flight::redirect('/periodos');
		} catch (DuplicatedRecordException $error) {
			Session::set('error', $error->getMessage());
			Flight::redirect('/periodos');
		}
	}

	static function ensureThereIsAtLeastOnePeriod(): true {
		$currentPeriod = Dependencies::getPeriodRepository()
			->setLapseRepository(Dependencies::getLapseRepository())
			->getLatest();

		Flight::view()->set('currentPeriod', $currentPeriod);

		return true;
	}

	static function showEditForm(string $id): void {
		$period = Dependencies::getPeriodRepository()
			->setLapseRepository(Dependencies::getLapseRepository())
			->getByID($id);

		$title = 'Editar periodo';
		UI::render('periods/edit', compact('period', 'title'));
	}

	static function handleEdit(string $id): void {
		$lapses = Flight::request()->data['lapsos'];
		$startYear = Flight::request()->data['inicio'];
		$repository = new LeafDBLapseRepository(new LeafDBPeriodRepository);

		self::validateLapses($startYear, $lapses);

		$period = Dependencies::getPeriodRepository()
			->setLapseRepository(Dependencies::getLapseRepository())
			->getByID($id);

		$repository->db()->connection()->beginTransaction();
		$repository->db()->update('periodos')->params([
			'inicio' => $startYear
		])->where('id', $id)->execute();

		$repository->db()->update('lapsos')->params([
			'inicio' => $lapses['primer']['inicio'],
			'fin' => $lapses['primer']['fin']
		])->where('nombre', '1er Lapso')->where('id_periodo', $period->getID())->execute();

		$repository->db()->update('lapsos')->params([
			'inicio' => $lapses['segundo']['inicio'],
			'fin' => $lapses['segundo']['fin']
		])->where('nombre', '2do Lapso')->where('id_periodo', $period->getID())->execute();

		$repository->db()->update('lapsos')->params([
			'inicio' => $lapses['tercer']['inicio'],
			'fin' => $lapses['tercer']['fin']
		])->where('nombre', '3er Lapso')->where('id_periodo', $period->getID())->execute();
		$repository->db()->connection()->commit();

		Session::set('success', 'Periodo actualizado exitósamente');
		Flight::redirect('/periodos');
	}

	private static function validateLapses(int $startYear, array $lapses): void {
		switch (true) {
			case $lapses['primer']['inicio'] >= $lapses['primer']['fin']:
			case $lapses['segundo']['inicio'] >= $lapses['segundo']['fin']:
			case $lapses['tercer']['inicio'] >= $lapses['tercer']['fin']:
				Session::set(
					'error',
					'Las fechas de inicio de los lapsos no pueden ser mayores que las fechas de cierre'
				);
				break;

			case $lapses['primer']['fin'] >= $lapses['segundo']['inicio']:
			case $lapses['segundo']['fin'] >= $lapses['tercer']['inicio']:
				Session::set(
					'error',
					'La fecha de cierre de un lapso debe ser menor que la fecha de inicio del siguiente lapso'
				);
				break;

			case !str_contains($lapses['primer']['inicio'], $startYear):
			case !str_contains($lapses['primer']['fin'], $startYear):
			case !str_contains($lapses['segundo']['inicio'], $startYear):
			case !str_contains($lapses['segundo']['fin'], $startYear):
			case !str_contains($lapses['tercer']['inicio'], $startYear):
			case !str_contains($lapses['tercer']['fin'], $startYear):
				Session::set('error', "Todos los lapsos deben ser del año $startYear");
				break;
		}

		if (Session::has('error')) {
			exit(Flight::redirect(Flight::request()->referrer));
		}
	}
}
