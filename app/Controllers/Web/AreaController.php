<?php

namespace App\Controllers\Web;

use App\Core\Dependencies;
use App\Core\UI;
use App\Exceptions\DuplicatedRecordException;
use App\Models\Area;
use Flight;
use Leaf\Form;

class AreaController {
	static function showAll(): void {
		$areas = Dependencies::getAreaRepository()->getAll();

		UI::render('areas', compact('areas'));
	}

	static function showInfo(string $slug): bool {
		$area = Dependencies::getAreaRepository()
			->setTeacherRepository(Dependencies::getTeacherRepository())
			->setClassroomRepository(Dependencies::getClassroomRepository())
			->getBySlug($slug);

		if (!$area) {
			return true;
		}

		$title = $area->name;
		UI::render('area', compact('area', 'title'));
		return false;
	}

	static function showEdit(string $slug): void {
	}

	static function edit(string $slug): void {
	}

	static function showRegisterForm(): void {
		$areas = Dependencies::getAreaRepository()->getAll();

		UI::render('area-register', compact('areas'));
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
