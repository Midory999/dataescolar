<?php

namespace App\Controllers;

use App\Core\{Dependencies, Session, UI, UUID};
use App\Models\{Teacher, User};
use Flight;
use InvalidArgumentException;
use Leaf\{Anchor, Form};
use Throwable;

/**
 * Controlador de la autenticación de usuarios, controla las operaciones relacionadas
 * con el ingreso y el egreso del sistema.
 */
final readonly class AuthenticationController {
	/** Muestra el formulario de inicio de sesión del sistema */
	static function showLogin(): void {
		UI::changeLayout(UI::VISITOR_LAYOUT);
		UI::render('login-and-user-register');
	}

	/** Captura y verifica las credenciales del usuario ingresadas en el formulario */
	static function verifyCredentials(): void {
		$denyAccess = function (): never {
			Session::set('error', 'Cédula o contraseña incorrecta');

			exit(Flight::redirect('/ingresar', 401));
		};

		$invalidCredentials = function (string $message): never {
			Session::set('error', $message);

			exit(Flight::redirect('/ingresar', 401));
		};

		$post = Flight::request()->data->getData();

		$post = Form::validate($post, [
			'cedula' => 'idCard',
			'clave' => 'required'
		]);

		Anchor::sanitize($post);

		if (!$post) {
			$errors = @Form::errors()['cedula'][0] . '<br />';
			$errors .= @Form::errors()['clave'][0];
			$invalidCredentials($errors);
		}

		$user = Dependencies::getUserRepository()->getByIDCard($post['cedula']);
		$teacher = Dependencies::getTeacherRepository()->getByIDCard($post['cedula']);

		if ($teacher) {
			if ($teacher->isValidPassword($post['clave'])) {
				Session::set('userID', $teacher->id);
				Flight::redirect('/');

				return;
			}

			$denyAccess();
		}

		if (!$user || !$user->isValidPassword($post['clave'])) {
			$denyAccess();
		}

		Session::set('userID', $user->id);
		Flight::redirect('/');
	}

	/** Operación encargada del egreso del sistema */
	static function logout(): void {
		Session::clean();
		Flight::redirect('/ingresar');
	}

	/** Operación encargada de verificar que el usuario ya haya iniciado sesión */
	static function ensureIsAuthenticated(): bool {
		if (!Session::has('userID')) {
			Flight::redirect('/ingresar');

			return false;
		}

		UI::changeLayout(UI::APP_LAYOUT);

		return true;
	}

	static function ensureIsAuthorized(): bool {
		$userLogged = self::getLoggedUser();

		if (!$userLogged) {
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
	static function getLoggedUser(): null|User|Teacher {
		try {
			$userID = new UUID(Session::get('userID'));

			return Dependencies::getUserRepository()->getByID($userID);
		} catch (InvalidArgumentException) {
			$teacherID = Session::get('userID');

			return Dependencies::getTeacherRepository()->getByID($teacherID);
		}
	}
}
