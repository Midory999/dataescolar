<?php

namespace App\Controllers\Web;

use App\Core\Dependencies;
use App\Core\UI;
use App\Exceptions\DuplicatedRecordException;
use App\Models\Lapse;
use App\Models\Period;
use Flight;
use Leaf\Form;

class PeriodController {
	static function showAll(): void {
		$periods = Dependencies::getPeriodRepository()
			->ensureThereIsOnePeriod()
			->setLapseRepository(Dependencies::getLapseRepository())
			->getAll();

		$mensaje = Flight::request()->query['mensaje'];
		$title = 'Periodos';

		UI::render('periods', compact('periods', 'mensaje', 'title'));
	}

	static function showRegisterForm(): void {
		$periods = Dependencies::getPeriodRepository()
			->ensureThereIsOnePeriod()
			->getAll();

		$title = 'Registrar periodo';
		UI::render('period-register', compact('periods', 'title'));
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

		// TODO: Garantizar que no existan colisiones de las fechas de inicio y fin de los lapsos

		if (Form::errors()) {
			Flight::redirect("/periodos");
			return;
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

			$mensaje = urlencode('Periodo registrado exitósamente');
			Flight::redirect("/periodos?mensaje=$mensaje");
		} catch (DuplicatedRecordException $error) {
			$error = urlencode($error->getMessage());
			Flight::redirect("/periodos?error=$error");
		}
	}
}
