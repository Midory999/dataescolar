<?php

use App\Controllers\AuthenticationController;
use App\Controllers\HomeController;
use App\Controllers\PeriodController;
use App\Controllers\UserController;

$homeController   = new HomeController;
$userController   = new UserController;
$periodController = new PeriodController;
$authenticationController = new AuthenticationController;

////////////////////
// RUTAS PÚBLICAS //
////////////////////
Flight::route(
	'GET /ingresar',
	[$authenticationController, 'showLogin']
);
Flight::route(
	'POST /ingresar',
	[$authenticationController, 'verifyCredentials']
);
Flight::route(
	'/salir',
	[$authenticationController, 'logout']
);

//////////////////////
// RUTAS PROTEGIDAS //
//////////////////////
Flight::route('*', [$authenticationController, 'ensureIsAuthenticated']);
Flight::route('GET /', [$homeController, 'showHome']);

///////////////////////////////////////////////
// RUTAS PROTEGIDAS + SÓLO ACCESO AUTORIZADO //
///////////////////////////////////////////////
Flight::route('*', [$authenticationController, 'ensureIsAuthorized']);
Flight::route('GET /usuarios',  [$userController, 'showUsersList']);
Flight::route('POST /usuarios', [$userController, 'registerUser']);

Flight::route(
	'GET /periodos',
	[$periodController, 'showPeriods']
);
Flight::route(
	'POST /periodos',
	[$periodController, 'registerPeriod']
);
Flight::route(
	'GET /periodos/registrar',
	[$periodController, 'showPeriodRegister']
);
