<?php

namespace App\Routes;

use App\Controllers\API\PeriodController;
use Flight;

Flight::route('GET /api/periodos', [PeriodController::class, 'showAll']);
Flight::route('POST /api/periodos', [PeriodController::class, 'register']);
