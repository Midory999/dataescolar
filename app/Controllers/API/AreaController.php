<?php

namespace App\Controllers\API;

use App\Adapters\Response;
use App\Core\Dependencies;
use App\Exceptions\DuplicatedRecordException;
use App\Models\Area;
use Flight;
use Leaf\Anchor;
use Leaf\Form;

class AreaController {
	static function showAll() {
		$areas = Dependencies::getAreaRepository()->getAllAsArray();

		Response::json($areas);
	}

	static function showInfo(string $slug): bool {
		$area = Dependencies::getAreaRepository()
			->setTeacherRepository(Dependencies::getTeacherRepository())
			->setClassroomRepository(Dependencies::getClassroomRepository())
			->getBySlug($slug);

		if (!$area) {
			return true;
		}

		Response::json($area->toArray());
	}

	static function register() {
		$info = Flight::request()->data;

		Anchor::sanitize($info);
		Form::validate(['nombre' => $info['nombre']], ['nombre' => 'name']);

		if (Form::errors()) {
			Response::json(Form::errors(), 400);
		}

		try {
			$area = Dependencies::getAreaRepository()->save(new Area($info['nombre']));

			Response::json($area->toArray(), 201);
		} catch (DuplicatedRecordException $error) {
			Response::json(['error' => $error->getMessage()], 409);
		}
	}
}
