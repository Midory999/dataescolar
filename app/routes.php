<?php

declare(strict_types=1);

use App\Controllers\{
	AuthenticationController,
	AreaController,
	UserController
};

$userController     = new UserController;
$authenticationController = new AuthenticationController;
$areaController = new AreaController;

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
); // WARNING: Esto es temporal

//////////////////////
// RUTAS PROTEGIDAS //
//////////////////////
Flight::route('*', [$authenticationController, 'ensureIsAuthenticated']);

Flight::route('GET /', 'App\Controllers\HomeController::showHome');

Flight::route('GET /representantes', 'App\Controllers\RepresentativeController::showRepresentatives');

Flight::route('GET /estudiantes', 'App\Controllers\StudentController::showStudents');
Flight::route('GET /profesores', 'App\Controllers\TeacherController::showTeachers');
Flight::route('GET /areas', [$areaController, 'showAreas']);
Flight::route('GET /lapsos', 'App\Controllers\LapseController::showLapses');
Flight::route('GET /niveles', function () {
	echo 'MOSTRAR LOS NIVELES';
});

///////////////////////////////////////////////
// RUTAS PROTEGIDAS + SÓLO ACCESO AUTORIZADO //
///////////////////////////////////////////////
Flight::route('*', [$authenticationController, 'ensureIsAuthorized']);

Flight::route('GET /representantes/registrar', 'App\Controllers\RepresentativeController::showRegisterForm');
Flight::route('POST /representantes','App\Controllers\RepresentativeController::registerRepresentative');

Flight::route('GET /estudiantes/registrar', 'App\Controllers\StudentController::showRegisterForm');
Flight::route('POST /estudiantes', 'App\Controllers\StudentController::registerStudent');

Flight::route('GET /profesores/registrar', 'App\Controllers\TeacherController::showRegisterForm');
Flight::route('POST /profesores', 'App\Controllers\TeacherController::registerTeacher');

Flight::route('GET /areas/registrar', [$areaController, 'showRegisterForm']);
Flight::route('POST /areas', [$areaController, 'registerArea']);

Flight::route('GET /lapsos/registrar', 'App\Controllers\LapseController::showRegisterForm');
Flight::route('POST /lapsos', 'App\Controllers\LapseController::registerLapse');

Flight::route('GET /usuarios',  [$userController, 'showUsersList']);
Flight::route('POST /usuarios', [$userController, 'registerUser']);

Flight::route('GET /periodos', 'App\Controllers\PeriodController::showPeriods');
Flight::route('POST /periodos', 'App\Controllers\PeriodController::registerPeriod');
Flight::route('GET /periodos/registrar', 'App\Controllers\PeriodController::showPeriodRegister');

Flight::route('GET /configuracion', 'App\Controllers\SettingsController::showSettings');
Flight::route('GET /configuracion/respaldar', 'App\Controllers\SettingsController::backup');
Flight::route('GET /configuracion/restaurar', 'App\Controllers\SettingsController::restore');
