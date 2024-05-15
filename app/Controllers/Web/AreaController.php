<?php

namespace App\Controllers\Web;

use App\Core\Dependencies;
use App\Core\UI;
use App\Exceptions\DuplicatedRecordException;
use App\Models\Area;
use Flight;
use Leaf\Form;

final readonly class AreaController {
	static function showAll(): void {
		$areas = Dependencies::getAreaRepository()->getAll();

		UI::render('areas', compact('areas'));
	}

	static function showInfo(string $code): bool {
		$area = Dependencies::getAreaRepository()
			->setTeacherRepository(Dependencies::getTeacherRepository())
			->setClassroomRepository(Dependencies::getClassroomRepository())
			->getByCode($code);

		if (!$area) {
			return true;
		}

		$title = $area->name;
		UI::render('area', compact('area', 'title'));
		return false;
	}

	static function showEdit(string $code): void {
		$title = 'Editar area';
		$area = Dependencies::getAreaRepository()
			->setTeacherRepository(Dependencies::getTeacherRepository())
			->setClassroomRepository(Dependencies::getClassroomRepository())
			->getByCode($code);

		$teachers = Dependencies::getTeacherRepository()->getAll();
		$classrooms = Dependencies::getClassroomRepository()->getAll();

		UI::render('areas/edit', compact('area', 'title', 'teachers', 'classrooms'));
	}

	static function edit(string $code): void {
		$info = Flight::request()->data;
		$area = Dependencies::getAreaRepository()->getByCode($code);
		$area->setName($info['nombre']);
		Dependencies::getAreaRepository()->save($area);
		$mensaje = urlencode('Area actualizada exitósamente');
		Flight::redirect("/areas?mensaje=$mensaje");
	}

	static function showRegisterForm(): void {
		$lastArea = Dependencies::getAreaRepository()->getRecent();

		UI::render('area-register', compact('lastArea'));
	}

	static function register(): void {
		$info = Flight::request()->data;

		Form::validate(['nombre' => $info['nombre']], ['nombre' => 'name']);

		if (Form::errors()) {
			Flight::redirect('/areas');
			return;
		}

		try {
			Dependencies::getAreaRepository()->save(new Area($info['nombre']));

			$mensaje = urlencode('Area registrada exitósamente');
			Flight::redirect("/areas?mensaje=$mensaje");
		} catch (DuplicatedRecordException $error) {
			$error = urlencode($error->getMessage());
			Flight::redirect("/areas?error=$error");
		}
	}
}
