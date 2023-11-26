<?php

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

$root = str_replace('/index.php', '', $_SERVER['PHP_SELF']);
UI::setData('root', $root);
UI::setData('assets', "$root/assets");
