<?php

# Autocargador de clases
require 'vendor/autoload.php';

# Rutas de la aplicación
require 'app/routes.php';

# Iniciando escucha de peticiones
Flight::start();
