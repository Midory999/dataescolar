<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Inscription;
use Flight;

class InscriptionController {
	static function showInscriptions(): void {
		$inscriptions = Dependencies::getInscriptionRepository()->getAll();

		$message = Flight::request()->query['message'];

		UI::render('inscriptions', compact('inscriptions', 'message'));
	}

	static function showRegisterForm(): void {
		$students = Dependencies::getStudentRepository()->getAll();
		$periods = Dependencies::getPeriodRepository()->getAll();
		$levels = Dependencies::getLevelRepository()->getAll();


		UI::render('inscription-register', compact('students', 'periods', 'levels'));
	}


	static function registerInscription(): void {
		$info = Flight::request()->data->getData();

		$inscription = new Inscription;
		$inscription->student = Dependencies::getStudentRepository()->getByID($info['id_estudiante']);
		$inscription->period = Dependencies::getPeriodRepository()->getByID($info['id_periodo']);
		$inscription->level = Dependencies::getLevelRepository()->getByID($info['id_nivele']);

		$inscription->name = $info['nombre'];

		Dependencies::getInscriptionRepository()->save($inscription);

		$message = urlencode('Inscripcion registrada exitósamente');
		Flight::redirect("/inscripciones?message=$message");
	}
}
