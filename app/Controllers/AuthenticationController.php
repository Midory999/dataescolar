<?php

// Ubicación de este módulo
namespace App\Controllers;

// Dependencias de este módulo
use App\Core\Dependencies;
use App\Core\Session;
use App\Core\UI;
use App\Models\Role;
use Flight;

/**
 * Controlador de la autenticación de usuarios, controla las operaciones relacionadas
 * con el ingreso y el egreso del sistema.
 */
class AuthenticationController {
	/** Muestra el formulario de inicio de sesión del sistema */
	function showLogin(): never {
		UI::render('login-and-user-register', [
			'roles' => Role::cases(),
			'error' => Flight::request()->query['error']
		]);
		exit;
	}

	/** Captura y verifica las credenciales del usuario ingresadas en el formulario */
	function verifyCredentials(): never {
		$post = Flight::request()->data->getData();
		$user = Dependencies::getUserRepository()->getByIDCard((int) $post['cedula']);

		$denyAccess = function (): never {
			$error = urlencode('Cédula o contraseña incorrecta');
			Flight::redirect("/ingresar?error=$error");
			exit;
		};

		if (!$user) {
			$denyAccess();
		}

		if (!$user->isValidPassword($post['clave'])) {
			$denyAccess();
		}

		Session::set('userID', $user->id);
		Flight::redirect('/');
		exit;
	}

	/** Operación encargada del egreso del sistema */
	function logout(): never {
		Session::clean();
		Flight::redirect('/ingresar');
		exit;
	}

	/** Operación encargada de verificar que el usuario ya haya iniciado sesión */
	function checkAccess(): bool {
		if (!Session::get('userID')) {
			Flight::redirect('/ingresar');
			exit;
		}

		return true;
	}
}
