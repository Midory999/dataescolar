<?php

use App\Core\Logger;
use App\Core\UI;

date_default_timezone_set('America/Caracas');

Logger::activate();

Flight::map('error', function (Throwable $error) {
	UI::render('500');
	Logger::log($error);
});

Flight::map('notFound', function () {
	UI::render('404');
});
