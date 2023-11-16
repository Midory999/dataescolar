<?php

namespace App\Controllers;

use App\Core\UI;

/**
 * Controlador general del sistema con las operaciones relacionadas con la página
 * de inicio.
 */
class HomeController {
	/** Muestra la página principal */
	static function showHome(): void {
		UI::render('home');
	}
}
