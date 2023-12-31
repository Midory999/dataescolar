<?php

namespace App\Routes;

use App\Controllers\Web\PeriodController;
use App\Controllers\Web\AreaController;
use Flight;

use App\Controllers\{
	AuthenticationController,
	LevelController,
	UserController
};
use App\Core\Dependencies;
use App\Core\UI;
use App\Models\Lapse;
use App\Repositories\LeafDB\LeafDBConnection;
use App\Repositories\LeafDB\LeafDBLapseRepository;
use App\Repositories\LeafDB\LeafDBPeriodRepository;
use PHPUnit\Framework\Attributes\Depends;

$userController     = new UserController;
$authenticationController = new AuthenticationController;
$levelController = new LevelController;

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
Flight::route('GET /areas/@slug', [AreaController::class, 'showInfo']);
Flight::route('GET /areas/@slug/editar', [AreaController::class, 'showEdit']);
Flight::route('POST /areas/@slug', [AreaController::class, 'edit']);
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

Flight::route('GET /niveles/registrar', [$levelController, 'showRegisterForm']);
Flight::route('POST /niveles', [$levelController, 'registerLevel']);

Flight::route('GET /lapsos/registrar', 'App\Controllers\LapseController::showRegisterForm');
Flight::route('POST /lapsos', 'App\Controllers\LapseController::registerLapse');

Flight::route('GET /aulas/registrar', 'App\Controllers\ClassroomController::showRegisterForm');
Flight::route('POST /aulas', 'App\Controllers\ClassroomController::registerClassroom');

Flight::route('GET /usuarios',  [$userController, 'showUsersList']);
Flight::route('POST /usuarios', [$userController, 'registerUser']);

Flight::route('GET /configuracion', 'App\Controllers\SettingsController::showSettings');
Flight::route('GET /configuracion/respaldar', 'App\Controllers\SettingsController::backup');
Flight::route('GET /configuracion/restaurar', 'App\Controllers\SettingsController::restore');

//////////////
// PERIODOS //
//////////////
Flight::route('POST /periodos', [PeriodController::class, 'register']);
Flight::route(
	'GET /periodos/registrar',
	[PeriodController::class, 'showRegisterForm']
);
Flight::route(
	'GET /periodos/@startYear/eliminar',
	function (string $startYear) {
		$db = (new LeafDBPeriodRepository)->db();

		$period = $db->select('periodos')->where('inicio', $startYear)->obj();
		$db->delete('periodos')->where('id', $period->id)->execute();
		$db->delete('lapsos')->where('id_periodo', $period->id)->execute();
		$message = urlencode('Periodo eliminado exitósamente');
		Flight::redirect("/periodos?mensaje=$message");
	}
);
Flight::route(
	'GET /periodos/@startYear/editar',
	function (string $startYear) {
		$repository = (new LeafDBPeriodRepository)->setLapseRepository(new LeafDBLapseRepository(new LeafDBPeriodRepository));
		$db = $repository->db();

		$period = $db->select('periodos')->where('inicio', $startYear)->assoc();
		$period = $repository->mapper($period);

		$title = 'Editar periodo';
		UI::render('periods/edit', compact('period', 'title'));
	}
);
Flight::route(
	'POST /periodos/@startYear',
	function (string $startYear) {
		$lapses = Flight::request()->data['lapsos'];
		$repository = new LeafDBLapseRepository(new LeafDBPeriodRepository);
		$period = $repository->db()->select('periodos')->where('inicio', $startYear)->assoc();
		$period = (new LeafDBPeriodRepository)->mapper($period);

		$repository->db()->update('lapsos')->params([
			'inicio' => $lapses['primer']['inicio'],
			'fin' => $lapses['primer']['fin']
		])->where('nombre', '1er Lapso')->where('id_periodo', $period->getID())->execute();

		$repository->db()->update('lapsos')->params([
			'inicio' => $lapses['segundo']['inicio'],
			'fin' => $lapses['segundo']['fin']
		])->where('nombre', '2do Lapso')->where('id_periodo', $period->getID())->execute();

		$repository->db()->update('lapsos')->params([
			'inicio' => $lapses['tercer']['inicio'],
			'fin' => $lapses['tercer']['fin']
		])->where('nombre', '3er Lapso')->where('id_periodo', $period->getID())->execute();

		$message = urlencode('Periodo actualizado exitósamente');
		Flight::redirect("/periodos?mensaje=$message");
	}
);
