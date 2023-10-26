<?php

use App\Controllers\AuthenticationController;
use App\Controllers\HomeController;
use App\Controllers\PeriodController;
use App\Controllers\UserController;
use App\Core\Dependencies;
use App\Core\UI;

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

Flight::route(
	'POST /usuarios',
	[$userController, 'registerUser']
); // NOTE: Esto es temporal, el registro debería estar protegido por administrador

//////////////////////
// RUTAS PROTEGIDAS //
//////////////////////
Flight::route('*', [$authenticationController, 'ensureIsAuthenticated']);
Flight::route('GET /', [$homeController, 'showHome']);

////////////////////////////////
// DATOS COMPARTIDOS EN LA UI //
////////////////////////////////
UI::setData('user', $authenticationController::getLoggedUser());
UI::setData('currentPeriod', Dependencies::getPeriodRepository()->getLatest());

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
