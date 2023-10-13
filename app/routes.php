<?php

use App\Core\Session;
use App\Core\UI;

Flight::route('GET /', function () {
	if (Session::get('userID') === null) {
		Flight::redirect('/ingresar');
	}
});

Flight::route('GET /ingresar', function () {
	UI::render('login-and-user-register', ['roles' => [
		'Administrador' => 'Administrador/a',
		'Director' => 'Director/a',
		'Secretario' => 'Secretario/a',
		'Profesor' => 'Profesor/a'
	]]);
});

Flight::route('POST /ingresar', function () {
	$userInfo = Flight::request()->data;

	$nombre = $userInfo['nombre'];
	$apellido = $_POST['apellido'];
	$usuario = $_POST['usuario'];
	$rol = $_POST['rol'];
	$clave = $_POST['clave'];
	$pregunta_de_seguridad = $_POST['pregunta_de_seguridad'];
	$respuesta_de_seguridad = $_POST['respuesta_de_seguridad'];
	//CONDICIONAL PARA NO DUPLICAR USUARIOS
	$query = "INSERT INTO usuarios(nombre, apellido, usuario, rol, clave, pregunta_de_seguridad, respuesta_de_seguridad)
	VALUES('$nombre', '$apellido', '$usuario', '$rol', '$clave', '$pregunta_de_seguridad', '$respuesta_de_seguridad')";

	$ejecutar = mysqli_query($conexion, $query);
});
