<?php

namespace App\Controllers;

use App\Core\Dependencies;
use App\Core\Session;
use App\Core\UI;
use App\Core\UUID;
use App\Models\User;

/**
 * Controlador general del sistema con las operaciones relacionadas con la página
 * de inicio.
 */
class HomeController {
	/** Muestra la página principal */
	function showHome(): never {
		$userLogged = $this->getLoggedUser();
		UI::render('home', ['user' => $userLogged]);
		exit;
	}

	/** Obtiene la información del usuario que inició sesión */
	private function getLoggedUser(): ?User {
		$userID = Session::get('userID');
		return Dependencies::getUserRepository()->getByID(new UUID($userID));
	}
}
