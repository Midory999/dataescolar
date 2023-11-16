<?php

use App\Core\Logger;

require 'vendor/autoload.php';

try {
	require 'app/config.php';
	require 'app/routes.php';

	Flight::start();
} catch (Throwable $error) {
	Logger::log($error->getMessage());
	Flight::error($error);
}
