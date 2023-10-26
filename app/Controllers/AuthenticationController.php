<?php

// Ubicación de este módulo
namespace App\Controllers;

// Dependencias de este módulo
use App\Core\{Dependencies, Session, UI, UUID};
use App\Models\{Role, User};
use Flight;

/**
 * Controlador de la autenticación de usuarios, controla las operaciones relacionadas
 * con el ingreso y el egreso del sistema.
 */
class AuthenticationController {
	/** Muestra el formulario de inicio de sesión del sistema */
	function showLogin(): void {
		UI::changeLayout(UI::VISITOR_LAYOUT);

		UI::render('login-and-user-register', [
			'roles' => Role::cases(),
			'error' => Flight::request()->query['error']
		]);
	}

	/** Captura y verifica las credenciales del usuario ingresadas en el formulario */
	function verifyCredentials(): void {
		$post = Flight::request()->data->getData();
		$user = Dependencies::getUserRepository()
			->getByIDCard((int) $post['cedula']);

		$denyAccess = function (): void {
			$error = urlencode('Cédula o contraseña incorrecta');
			Flight::redirect("/ingresar?error=$error", 401);
		};

		if ($user === null) {
			$denyAccess();
			return;
		}

		if (!$user->isValidPassword($post['clave'])) {
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
	function ensureIsAuthenticated(): bool {
		if (Session::get('userID') === null) {
			Flight::redirect('/ingresar');
			return false;
		}

		return true;
	}

	function ensureIsAuthorized(): bool {
		$userLogged = Dependencies::getUserRepository()->getByID(
			new UUID(Session::get('userID'))
		);

		if ($userLogged === null) {
			Flight::redirect('/salir');
			return false;
		}

		if ($userLogged->isAdmin()) {
			return true;
		}

		Flight::redirect('/');
		return false;
	}

	/** Obtiene la información del usuario que inició sesión */
	static function getLoggedUser(): ?User {
		$userID = Session::get('userID');
		return Dependencies::getUserRepository()->getByID(new UUID($userID));
	}
}
