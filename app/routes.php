<?php

use App\Core\Dependencies;
use App\Core\Session;
use App\Core\UI;
use App\Core\UUID;
use App\Models\Role;
use App\Models\User;

Flight::route('GET /', function () {
	$userID = Session::get('userID');
	if (!$userID) {
		Flight::redirect('/ingresar');
		return;
	}

	$userLogged = Dependencies::getUserRepository()->getByID(new UUID($userID));
	UI::render('home', ['user' => $userLogged]);
});

Flight::route('GET /ingresar', function () {
	UI::render('login-and-user-register', [
		'roles' => Role::cases(),
		'error' => Flight::request()->query['error']
	]);
});

Flight::route('POST /ingresar', function () {
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
});

Flight::route('GET /usuarios', function () {
	UI::render('users', ['users' => Dependencies::getUserRepository()->getAll()]);
});

Flight::route('POST /usuarios', function () {
	$post = Flight::request()->data->getData();
	$user = User::fromPOST($post);
	$result = Dependencies::getUserRepository()->save($user);

	if ($result) {
		Flight::redirect('/usuarios');
		return;
	}

	$error = urlencode('Ha ocurrido un error');
	Flight::redirect("/ingresar?error=$error");
});

Flight::route('/salir', function () {
	Session::clean();
	Flight::redirect('/ingresar');
});
