<?php

use App\Controllers\{
	AuthenticationController,
	HomeController,
	PeriodController,
	RepresentativeController,
	SettingsController,
  StudentController,
  TeacherController,
	AreaController,
  UserController
};

$homeController     = new HomeController;
$userController     = new UserController;
$periodController   = new PeriodController;
$settingsController = new SettingsController;
$authenticationController = new AuthenticationController;
$representativeController = new RepresentativeController;
$studentController = new StudentController;
$teacherController = new TeacherController;
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

Flight::route('GET /', [$homeController, 'showHome']);

Flight::route(
	'GET /representantes',
	[$representativeController, 'showRepresentatives']
);

Flight::route('GET /estudiantes', [$studentController, 'showStudents']);

Flight::route('GET /profesores', [$teacherController, 'showTeachers']);

Flight::route('GET /areas', [$areaController, 'showAreas']);

///////////////////////////////////////////////
// RUTAS PROTEGIDAS + SÓLO ACCESO AUTORIZADO //
///////////////////////////////////////////////
Flight::route('*', [$authenticationController, 'ensureIsAuthorized']);

Flight::route(
	'GET /representantes/registrar',
	[$representativeController, 'showRegisterForm']
);

Flight::route(
	'POST /representantes',
	[$representativeController, 'registerRepresentative']
);

Flight::route('GET /estudiantes/registrar', [$studentController, 'showRegisterForm']);
Flight::route('POST /estudiantes', [$studentController, 'registerStudent']);

Flight::route('GET /profesores/registrar', [$teacherController, 'showRegisterForm']);
Flight::route('POST /profesores', [$teacherController, 'registerTeacher']);

Flight::route('GET /areas/registrar', [$areaController, 'showRegisterForm']);
Flight::route('POST /areas', [$areaController, 'registerArea']);

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

Flight::route('GET /configuracion', [$settingsController, 'showSettings']);
Flight::route('GET /configuracion/respaldar', [$settingsController, 'backup']);
Flight::route('GET /configuracion/restaurar', [$settingsController, 'restore']);
