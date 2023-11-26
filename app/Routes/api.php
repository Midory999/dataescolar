<?php

namespace App\Routes;

use App\Controllers\API\AreaController;
use App\Controllers\API\PeriodController;
use Flight;

//////////////
// PERIODOS //
//////////////
Flight::route('GET /api/periodos', [PeriodController::class, 'showAll']);
Flight::route('POST /api/periodos', [PeriodController::class, 'register']);

///////////
// AREAS //
///////////
Flight::route('GET /api/areas', [AreaController::class, 'showAll']);
Flight::route('POST /api/areas', [AreaController::class, 'register']);
Flight::route('GET /api/areas/@slug', [AreaController::class, 'showInfo']);
