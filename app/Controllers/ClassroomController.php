<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Classroom;
use Flight;

class ClassroomController {
	static function showClassrooms(): void {
		$classrooms = Dependencies::getClassroomRepository()->getAll();

		$message = Flight::request()->query['message'];

		UI::render('classrooms', compact('classrooms', 'message'));
	}

	static function showRegisterForm(): void {
		$teachers = Dependencies::getTeacherRepository()->getAll();

		UI::render('classroom-register', compact('teachers'));
	}

	static function registerClassroom(): void {
		$info = Flight::request()->data->getData();

		$classroom = new Classroom(
			$info['nombre'],
			Dependencies::getTeacherRepository()->getByID($info['id_profesores'])
		);

		Dependencies::getClassroomRepository()->save($classroom);

		$message = urlencode('Aula registrado exitósamente');
		Flight::redirect("/aulas?message=$message");
	}
}
