<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Area;
use Flight;

class AreaController {
	function showAreas(): void {
		$areas = Dependencies::getAreaRepository()->getAll();

		UI::render('areas', compact('areas'));
	}

	function showRegisterForm(): void {
		$areas = Dependencies::getAreaRepository()->getAll();

		UI::render('area-register', compact('areas'));
	}

	function registerArea(): void {
		$areaInfo = Flight::request()->data->getData();

		$area = new Area;
		$area->code = $areaInfo['codigo'];
		$area->name = $areaInfo['nombre'];

		Dependencies::getAreaRepository()->save($area);
		Flight::redirect('/areas');
	}
}
