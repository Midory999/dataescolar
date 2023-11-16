<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Representative;
use Flight;

class RepresentativeController {
	static function showRepresentatives(): void {
		$representatives = Dependencies::getRepresentativeRepository()->getAll();

		UI::render('representatives', compact('representatives'));
	}

	static function showRegisterForm(): void {
		UI::render('representative-register');
	}

	static function registerRepresentative(): void {
		$representativeInfo = Flight::request()->data->getData();
		$representative = new Representative;

		$representative->idCard = $representativeInfo['cedula'];
		$representative->names = $representativeInfo['nombre'];
		$representative->lastnames = $representativeInfo['apellido'];
		$representative->gender = $representativeInfo['genero'];
		$representative->direction = $representativeInfo['direccion'];
		$representative->email = $representativeInfo['correo'];
		$representative->phone = $representativeInfo['telefono'];
		$representative->bloodType = $representativeInfo['tipo_sangre'];
		$representative->ocupation = $representativeInfo['ocupacion'];
		$representative->jobPlace = $representativeInfo['lugar_trabajo'];
		$representative->studies = $representativeInfo['estudio'];
		Dependencies::getRepresentativeRepository()->save($representative);

		Flight::redirect('/representantes');
	}
}
