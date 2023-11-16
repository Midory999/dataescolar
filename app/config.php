<?php

use App\Controllers\AuthenticationController;
use App\Controllers\ErrorController;
use App\Core\Dependencies;
use App\Core\Logger;
use App\Core\UI;

date_default_timezone_set('America/Caracas');

Logger::activate();

Flight::map('error', [ErrorController::class, 'handle500']);
Flight::map('notFound', [ErrorController::class, 'handle404']);
Flight::set('root', str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']));

////////////////////////////////
// DATOS COMPARTIDOS EN LA UI //
////////////////////////////////
$authenticationController = new AuthenticationController;

UI::setData('user', $authenticationController::getLoggedUser());
UI::setData('currentPeriod', Dependencies::getPeriodRepository()->getLatest());
UI::setData('root', Flight::get('root'));
UI::setData('assets', Flight::get('root') . '/assets');
UI::setData('school', Dependencies::getSettingRepository()->getSchool());
