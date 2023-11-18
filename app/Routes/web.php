<?php

namespace App\Routes;

use App\Controllers\Web\PeriodController;
use App\Controllers\AuthenticationController as AuthController;
use Flight;

Flight::route('*', [AuthController::class, 'ensureIsAuthenticated']);
Flight::route('*', [AuthController::class, 'ensureIsAuthorized']);

Flight::route('GET /periodos', [PeriodController::class, 'showAll']);
Flight::route('POST /periodos', [PeriodController::class, 'register']);
Flight::route(
	'GET /periodos/registrar',
	[PeriodController::class, 'showRegisterForm']
);
