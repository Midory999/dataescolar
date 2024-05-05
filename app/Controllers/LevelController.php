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

		Dependencies::getLevelRepository()->save($level);
		Flight::redirect('/niveles');
	}

	function showEdit(string $id): void {
		$level = Dependencies::getLevelRepository()->getByID($id);

		UI::render('levels/edit', compact('level'));
	}

	function handleEdit(string $id): void {
		$info = Flight::request()->data;
		$level = Dependencies::getLevelRepository()->getById($id);
		$level->code = $info['codigo'];

		Dependencies::getLevelRepository()->save($level);
		$message = urlencode('Nivel actualizado exitósamente');
		Flight::redirect("/niveles?mensaje=$message");
	}
}
