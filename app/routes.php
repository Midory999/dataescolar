<?php

//////////////////
// Dependencias //
//////////////////
use App\Controllers\AuthenticationController;
use App\Controllers\HomeController;
use App\Controllers\UserController;

////////////////////////////////////
// Instanciación de Controladores //
////////////////////////////////////
$homeController = new HomeController;
$authenticationController = new AuthenticationController;
$userController = new UserController;

/////////////////////////////////////////
// Definición de rutas y controladores //
/////////////////////////////////////////
#              URL              CONTROLLER                  METHOD
Flight::route('GET /',          [$authenticationController, 'checkAccess']);
Flight::route('GET /',          [$homeController,           'showHome']);

Flight::route('GET /ingresar',  [$authenticationController, 'showLogin']);
Flight::route('POST /ingresar', [$authenticationController, 'verifyCredentials']);
Flight::route('/salir',         [$authenticationController, 'logout']);

Flight::route('/usuarios',      [$authenticationController, 'checkAccess']);
Flight::route('GET /usuarios',  [$userController,           'showUsersList']);
Flight::route('POST /usuarios', [$userController,           'registerUser']);
