<?php

namespace App\Controllers;

use App\Core\Dependencies;
use App\Core\Session;
use App\Core\UI;
use App\Exceptions\DuplicatedIDCardException;
use App\Models\User;
use Flight;
use Leaf\Anchor;
use Leaf\Form;

/**
 * Controlador de las operaciones relacionadas con la lectura y escritura de usuarios.
 */
final readonly class UserController {
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

		$post = Form::validate($post, [
			'nombre' => 'name',
			'apellido' => 'name',
			'cedula' => 'idCard',
			'clave' => 'password',
			'pregunta' => 'required',
			'respuesta' => 'answer'
		]);

		Anchor::sanitize($post);

		if (!$post) {
			$errors = '';

			foreach (Form::errors() as $error) {
				$errors .= @$error[0] . '<br />';
			}

			Session::set('error', $errors);
			exit(Flight::redirect(Flight::request()->referrer, 400));
		}

		$user = User::fromPOST($post);

		try {
			Dependencies::getUserRepository()->save($user);
			Session::set('success', "$user->role registrado exitósamente");
		} catch (DuplicatedIDCardException) {
			Session::set('error', "Ya existe usuario con la cédula $user->idCard");

			exit(Flight::redirect(Flight::request()->referrer, 409));
		}

		Flight::redirect('/usuarios');
	}
}
