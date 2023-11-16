<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Teacher;
use Flight;

class TeacherController {
	static function showTeachers(): void {
		$teachers = Dependencies::getTeacherRepository()->getAll();

		UI::render('teachers', compact('teachers'));
	}

	static function showRegisterForm(): void {
		$areas = Dependencies::getAreaRepository()->getAll();

		UI::render('teacher-register', compact('areas'));
	}

	static function registerTeacher(): void {
		$teacherInfo = Flight::request()->data->getData();

		$teacher = new Teacher;

		$teacher->idCard = $teacherInfo['cedula'];
		$teacher->names = $teacherInfo['nombre'];
		$teacher->lastnames = $teacherInfo['apellido'];
		$teacher->status = $teacherInfo['estatus'];
		$teacher->specialty = $teacherInfo['especialidad'];
		$teacher->direction = $teacherInfo['direccion'];
		$teacher->email = $teacherInfo['correo'];
		$teacher->phone = $teacherInfo['telefono'];
		$teacher->income = $teacherInfo['ingreso'];
		$teacher->birthDate = $teacherInfo['fecha_nacimiento'];
		$teacher->age = $teacherInfo['edad'];
		$teacher->gender = $teacherInfo['genero'];
		$teacher->vaccines = $teacherInfo['vacunas'];
		$teacher->socialPrograms = $teacherInfo['carga_horaria'];
		$teacher->area = Dependencies::getAreaRepository()->getByCode($teacherInfo['id_area']);

		Dependencies::getTeacherRepository()->save($teacher);
		Flight::redirect('/profesores');
	}
}
