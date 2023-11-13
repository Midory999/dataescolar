<?php

use App\Controllers\AuthenticationController;
use App\Core\Dependencies;
use App\Core\Logger;
use App\Core\UI;

date_default_timezone_set('America/Caracas');

Logger::activate();

Flight::map('error', function (Throwable $error) {
	UI::changeLayout(UI::VISITOR_LAYOUT);
	UI::render('500');
	Logger::log($error);
});

Flight::map('notFound', function () {
	UI::changeLayout(UI::VISITOR_LAYOUT);
	UI::render('404');
});

Flight::set('root', str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']));

////////////////////////////////
// DATOS COMPARTIDOS EN LA UI //
////////////////////////////////
$authenticationController = new AuthenticationController;
UI::setData('user', $authenticationController::getLoggedUser());
UI::setData('currentPeriod', Dependencies::getPeriodRepository()->getLatest());
UI::setData('root', Flight::get('root'));
UI::setData('assets', Flight::get('root') . '/assets');
