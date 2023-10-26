<?php

namespace App\Controllers;

use App\Core\Dependencies;
use App\Core\UI;
use App\Models\User;
use Flight;

/**
 * Controlador de las operaciones relacionadas con la lectura y escritura de usuarios.
 */
class UserController {
	/** Muestra la lista de usuarios */
	function showUsersList(): void {
		UI::changeLayout(UI::APP_LAYOUT);
		UI::render('users', ['users' => Dependencies::getUserRepository()->getAll()]);
	}

	/** Maneja el proceso de registro y persistencia del usuario */
	function registerUser(): void {
		$post = Flight::request()->data->getData();
		$user = User::fromPOST($post);
		$result = Dependencies::getUserRepository()->save($user);

		if ($result) {
			Flight::redirect('/usuarios');
			return;
		}

		$error = urlencode('Ha ocurrido un error');
		Flight::redirect("/ingresar?error=$error");
	}
}
