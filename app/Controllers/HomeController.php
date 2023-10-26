<?php

namespace App\Controllers;

use App\Core\UI;

/**
 * Controlador general del sistema con las operaciones relacionadas con la página
 * de inicio.
 */
class HomeController {
	/** Muestra la página principal */
	function showHome(): void {
		UI::changeLayout(UI::APP_LAYOUT);
		UI::render('home');
	}
}
