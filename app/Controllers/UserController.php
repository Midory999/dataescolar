<?php

namespace App\Controllers;

use App\Core\Dependencies;
use App\Core\UI;
use App\Exceptions\DuplicatedIDCardException;
use App\Models\User;
use Flight;

/**
 * Controlador de las operaciones relacionadas con la lectura y escritura de usuarios.
 */
class UserController {
	/** Muestra la lista de usuarios */
	function showUsersList(): void {
		UI::changeLayout(UI::APP_LAYOUT);
		UI::render('users/list', ['users' => Dependencies::getUserRepository()->getAll()]);
	}

	function showRegisterForm(): void {
		UI::changeLayout(UI::APP_LAYOUT);
		UI::render('users/register');
	}

	/** Maneja el proceso de registro y persistencia del usuario */
	function registerUser(): void {
		$post = Flight::request()->data->getData();
		$user = User::fromPOST($post);

		try {
			$result = Dependencies::getUserRepository()->save($user);

			if ($result) {
				Flight::redirect('/usuarios');
				return;
			}

			$error = urlencode('Ha ocurrido un error');
		} catch (DuplicatedIDCardException) {
			$error = urlencode('Ya existe usuario con la cédula ' . $user->idCard);
		}

		Flight::redirect("/ingresar?error=$error");
	}
}
