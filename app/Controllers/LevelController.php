<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Level;
use Flight;

class LevelController {
	function showLevels(): void {
		$levels = Dependencies::getLevelRepository()->getAll();

		UI::render('levels', compact('levels'));
	}

	function showRegisterForm(): void {
		$levels = Dependencies::getLevelRepository()->getAll();

		UI::render('level-register', compact('levels'));
	}

	function registerLevel(): void {
		$levelInfo = Flight::request()->data->getData();

		$level = new Level;
		$level->code = $levelInfo['codigo'];
		$level->name = $levelInfo['nombre'];

		Dependencies::getLevelRepository()->save($level);
		Flight::redirect('/niveles');
	}
}
