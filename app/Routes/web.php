<?php

namespace App\Routes;

use App\Controllers\Web\PeriodController;
use App\Controllers\Web\AreaController;
use App\Controllers\AuthenticationController as AuthController;
use Flight;

# Flight::route('*', [AuthController::class, 'ensureIsAuthenticated']);
# Flight::route('*', [AuthController::class, 'ensureIsAuthorized']);

//////////////
// PERIODOS //
//////////////
Flight::route('GET /periodos', [PeriodController::class, 'showAll']);
Flight::route('POST /periodos', [PeriodController::class, 'register']);
Flight::route(
	'GET /periodos/registrar',
	[PeriodController::class, 'showRegisterForm']
);

///////////
// AREAS //
///////////
Flight::route('GET /areas', [AreaController::class, 'showAll']);
Flight::route('POST /areas', [AreaController::class, 'register']);
Flight::route('GET /areas/registrar', [AreaController::class, 'showRegisterForm']);
Flight::route('GET /areas/@slug', [AreaController::class, 'showInfo']);
Flight::route('GET /areas/@slug/editar', [AreaController::class, 'showEdit']);
Flight::route('POST /areas/@slug', [AreaController::class, 'edit']);
