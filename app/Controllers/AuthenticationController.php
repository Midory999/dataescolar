<?php

namespace App\Controllers;

use App\Core\{Dependencies, Session, UI, UUID};
use App\Models\{Role, User};
use Flight;
use Leaf\{Anchor, Form};

/**
 * Controlador de la autenticación de usuarios, controla las operaciones relacionadas
 * con el ingreso y el egreso del sistema.
 */
class AuthenticationController {
	/** Muestra el formulario de inicio de sesión del sistema */
	function showLogin(): void {
		UI::changeLayout(UI::VISITOR_LAYOUT);

		UI::render('login-and-user-register', [
			'roles' => array_filter(Role::cases(), function (Role $role): bool {
				return $role !== Role::ADMIN && $role !== Role::PRINCIPAL;
			}),
			'error' => Flight::request()->query['error']
		]);
	}

	/** Captura y verifica las credenciales del usuario ingresadas en el formulario */
	function verifyCredentials(): void {
		$denyAccess = function (): void {
			$error = urlencode('Cédula o contraseña incorrecta');
			Flight::redirect("/ingresar?error=$error", 401);
		};

		$invalidCredentials = function (string $message): void {
			$error = urlencode($message);
			Flight::redirect("/ingresar?error=$error", 401);
		};

		$post = Flight::request()->data->getData();
		Anchor::sanitize($post);

		$post = Form::validate($post, [
			'cedula' => 'required|number',
			'clave' => 'required'
		]);

		if ($post === false) {
			$errors = @Form::errors()['cedula'][0] ?? '';
			$errors .= @Form::errors()['clave'][0] ?? '';
			$invalidCredentials($errors);
			return;
		}

		$user = Dependencies::getUserRepository()->getByIDCard((int) @$post['cedula']);

		if ($user === null || !$user->isValidPassword($post['clave'])) {
			$denyAccess();
			return;
		}

		Session::set('userID', $user->id);
		Flight::redirect('/');
	}

	/** Operación encargada del egreso del sistema */
	function logout(): void {
		Session::clean();
		Flight::redirect('/ingresar');
	}

	/** Operación encargada de verificar que el usuario ya haya iniciado sesión */
	static function ensureIsAuthenticated(): bool {
		if (Session::get('userID') === null) {
			Flight::redirect('/ingresar');
			return false;
		}

		UI::changeLayout(UI::APP_LAYOUT);
		return true;
	}

	static function ensureIsAuthorized(): bool {
		$userID = new UUID(Session::get('userID'));
		$userLogged = Dependencies::getUserRepository()->getByID($userID);

		if ($userLogged === null) {
			Flight::redirect('/salir');
			return false;
		}

		if ($userLogged->isAdmin()) {
			return true;
		}

		Session::set('error', 'Acceso denegado');
		Flight::redirect('/');
		return false;
	}

	/** Obtiene la información del usuario que inició sesión */
	static function getLoggedUser(): ?User {
		$userID = new UUID(Session::get('userID'));
		return Dependencies::getUserRepository()->getByID($userID);
	}
}
