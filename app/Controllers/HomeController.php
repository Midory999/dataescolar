<?php

namespace App\Controllers;

use App\Core\Dependencies;
use App\Core\Session;
use App\Core\UI;

/**
 * Controlador general del sistema con las operaciones relacionadas con la página
 * de inicio.
 */
class HomeController {
	/** Muestra la página principal */
	static function showHome(): void {
		Dependencies::getPeriodRepository()
			->setLapseRepository(Dependencies::getLapseRepository())
			->ensureThereIsOnePeriod();

		$error = Session::get('error');

		if ($error) {
			Session::delete('error');
		}

		UI::render('home', compact('error'));
	}
}
