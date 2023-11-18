<?php

use App\Controllers\AuthenticationController;
use App\Controllers\ErrorController;
use App\Core\Dependencies;
use App\Core\Logger;
use App\Core\UI;
use Leaf\Form;

date_default_timezone_set('America/Caracas');

Logger::activate();

Flight::map('error', [ErrorController::class, 'handle500']);
Flight::map('notFound', [ErrorController::class, 'handle404']);
Flight::set('root', str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']));

Form::message(
	json_decode(
		file_get_contents(__DIR__ . '/Translations/spanish.json'),
		true
	)
);

Form::addRule('year', function (mixed $value): bool {
	$year = date('Y');
	Form::message('year', "{Field} debe ser un año válido (1970 al $year)");
	return $value >= 1970 && $value <= $year;
});

////////////////////////////////
// DATOS COMPARTIDOS EN LA UI //
////////////////////////////////
$authenticationController = new AuthenticationController;

UI::setData('user', $authenticationController::getLoggedUser());
UI::setData('currentPeriod', Dependencies::getPeriodRepository()->getLatest());
UI::setData('root', Flight::get('root'));
UI::setData('assets', Flight::get('root') . '/assets');
UI::setData('school', Dependencies::getSettingRepository()->getSchool());
