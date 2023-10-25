<?php

# Autocargador de clases
require 'vendor/autoload.php';

try {
	require 'app/config.php';
	# Rutas de la aplicación
	require 'app/routes.php';

	# Iniciando escucha de peticiones
	Flight::start();
} catch (Throwable $error) {
	# Captura cualquier error
	Flight::error($error);
}
