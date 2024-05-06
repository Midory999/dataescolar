<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Classroom;
use Flight;

final readonly class ClassroomController {
	static function showClassrooms(): void {
		$classrooms = Dependencies::getClassroomRepository()->getAll();

		UI::render('classrooms/list', compact('classrooms'));
	}

	static function showRegisterForm(): void {
		$teachers = Dependencies::getTeacherRepository()->getAll();

		UI::render('classrooms/register', compact('teachers'));
	}

	static function registerClassroom(): void {
		$info = Flight::request()->data->getData();

		$classroom = new Classroom(
			$info['nombre'],
			Dependencies::getTeacherRepository()->getByID($info['id_profesores'])
		);

		Dependencies::getClassroomRepository()->save($classroom);

		$message = urlencode('Aula registrado exitósamente');
		Flight::redirect("/aulas?mensaje=$message");
	}

	static function showInfo(string $id): void {
		$classroom = Dependencies::getClassroomRepository()->getByID($id);

		UI::render('classrooms/info', compact('classroom'));
	}
}
