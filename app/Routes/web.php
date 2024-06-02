<?php

namespace App\Routes;

use App\Controllers\Web\PeriodController;
use App\Controllers\Web\AreaController;
use Flight;

use App\Controllers\{
	AuthenticationController,
	ClassroomController,
	HomeController,
	LevelController,
	SettingsController,
	TeacherController,
	UserController
};

$userController = new UserController;
$authenticationController = new AuthenticationController;
$levelController = new LevelController;

////////////////////
// RUTAS PÚBLICAS //
////////////////////
Flight::route('GET /ingresar', [AuthenticationController::class, 'showLogin']);
Flight::route('POST /ingresar', [AuthenticationController::class, 'verifyCredentials']);
Flight::route('/salir', [AuthenticationController::class, 'logout']);

// WARNING: Esto es temporal
Flight::route('POST /usuarios', [$userController, 'registerUser']);

//////////////////////
// RUTAS PROTEGIDAS //
//////////////////////
Flight::route('*', [AuthenticationController::class, 'ensureIsAuthenticated']);
Flight::route('*', [PeriodController::class, 'ensureThereIsAtLeastOnePeriod']);

Flight::route('GET /', [HomeController::class, 'showHome']);

Flight::route('GET /representantes', 'App\Controllers\RepresentativeController::showRepresentatives');

Flight::route('GET /inscripciones', 'App\Controllers\InscriptionController::showInscriptions');

Flight::route('GET /informes', 'App\Controllers\ReportController::showReports');

Flight::route('GET /estudiantes', 'App\Controllers\StudentController::showStudents');
Flight::route('GET /profesores', 'App\Controllers\TeacherController::showTeachers');
Flight::route('GET /niveles', [$levelController, 'showLevels']);
Flight::route('GET /lapsos', 'App\Controllers\LapseController::showLapses');
Flight::route('GET /aulas', 'App\Controllers\ClassroomController::showClassrooms');

///////////
// AREAS //
///////////
Flight::route('GET /areas', [AreaController::class, 'showAll']);
Flight::route('POST /areas', [AreaController::class, 'register']);
Flight::route('GET /areas/registrar', [AreaController::class, 'showRegisterForm']);
Flight::route('GET /areas/@code', [AreaController::class, 'showInfo']);
Flight::route('GET /areas/@code/editar', [AreaController::class, 'showEdit']);
Flight::route('POST /areas/@code', [AreaController::class, 'edit']);
Flight::route('GET /periodos', [PeriodController::class, 'showAll']);


///////////////////////////////////////////////
// RUTAS PROTEGIDAS + SÓLO ACCESO AUTORIZADO //
///////////////////////////////////////////////
Flight::route('*', [$authenticationController, 'ensureIsAuthorized']);

Flight::route('GET /inscripciones/registrar', 'App\Controllers\InscriptionController::showRegisterForm');
Flight::route('POST /inscripciones', 'App\Controllers\InscriptionController::registerInscription');

Flight::route('GET /informes/registrar', 'App\Controllers\ReportController::showRegisterForm');
Flight::route('POST /informes', 'App\Controllers\ReportController::registerReport');

Flight::route('GET /representantes/registrar', 'App\Controllers\RepresentativeController::showRegisterForm');
Flight::route('POST /representantes', 'App\Controllers\RepresentativeController::registerRepresentative');

Flight::route('GET /estudiantes/registrar', 'App\Controllers\StudentController::showRegisterForm');
Flight::route('POST /estudiantes', 'App\Controllers\StudentController::registerStudent');

Flight::route('GET /profesores/registrar', 'App\Controllers\TeacherController::showRegisterForm');
Flight::route('POST /profesores', 'App\Controllers\TeacherController::registerTeacher');
Flight::route('GET /profesores/@id', [TeacherController::class, 'showTeacherInfo']);

Flight::route('GET /niveles/registrar', [$levelController, 'showRegisterForm']);
Flight::route('POST /niveles', [$levelController, 'registerLevel']);
Flight::route('GET /niveles/@id', [$levelController, 'showEdit']);
Flight::route('POST /niveles/@id', [$levelController, 'handleEdit']);

Flight::route('GET /lapsos/registrar', 'App\Controllers\LapseController::showRegisterForm');
Flight::route('POST /lapsos', 'App\Controllers\LapseController::registerLapse');

Flight::route('GET /aulas/registrar', 'App\Controllers\ClassroomController::showRegisterForm');
Flight::route('POST /aulas', 'App\Controllers\ClassroomController::registerClassroom');
Flight::route('GET /aulas/@id', [ClassroomController::class, 'showInfo']);

Flight::route('GET /usuarios',  [$userController, 'showUsersList']);
Flight::route('POST /usuarios', [$userController, 'registerUser']);
Flight::route('GET /usuarios/añadir', [$userController, 'showRegisterForm']);

Flight::route('GET /configuracion', [SettingsController::class, 'showSettings']);
Flight::route('GET /configuracion/respaldar', [SettingsController::class, 'backup']);
Flight::route('GET /configuracion/restaurar', [SettingsController::class, 'restore']);

//////////////
// PERIODOS //
//////////////
Flight::route('POST /periodos', [PeriodController::class, 'register']);
Flight::route(
	'GET /periodos/registrar',
	[PeriodController::class, 'showRegisterForm']
);

Flight::route('GET /periodos/@id/editar', [PeriodController::class, 'showEditForm']);
Flight::route('POST /periodos/@id', [PeriodController::class, 'handleEdit']);
