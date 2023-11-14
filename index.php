<?php

require 'vendor/autoload.php';

try {
	require 'app/config.php';
	require 'app/routes.php';

	Flight::start();
} catch (Throwable $error) {
	Flight::error($error);
}
