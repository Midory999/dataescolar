<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Student;
use Flight;

class StudentController {
	static function showStudents(): void {
		$students = Dependencies::getStudentRepository()->getAll();

		$message = Flight::request()->query['message'];

		UI::render('students', compact('students', 'message'));
	}

	static function showRegisterForm(): void {
		$representatives = Dependencies::getRepresentativeRepository()->getAll();

		UI::render('student-register', compact('representatives'));
	}

	static function registerStudent(): void {
		$info = Flight::request()->data->getData();
		$representative = Dependencies::getRepresentativeRepository()->getByID($info['id_representante']);

		$student = new Student;
		$student->representative = $representative;
		$student->idCard = $info['cedula'];
		$student->names = $info['nombre'];
		$student->lastnames = $info['apellido'];
		$student->birthDate = $info['fecha_nacimiento'];
		$student->birthPlace = $info['lugar_nacimiento'];
		$student->age = $info['edad'];
		$student->birthType = $info['tipo_parto'];
		$student->compromises = $info['compromiso'];
		$student->medicines = $info['medicamentos'];
		$student->bloodType = $info['tipo_sangre'];
		$student->gender = $info['genero'];
		$student->direction = $info['direccion'];
		$student->measurements = "{$info['pregunta1']},{$info['pregunta2']},{$info['pregunta3']},{$info['pregunta4']},{$info['pregunta5']},{$info['pregunta6']}";
		$student->vaccines = $info['vacunas'];
		$student->socialPrograms = $info['programas_sociales'];
		$student->admission = $info['ingreso'];
		$student->status = $info['estatus'] === 'activo' ? true : false;
		$student->description = $info['descripcion'];

		Dependencies::getStudentRepository()->save($student);

		$message = urlencode('Estudiante registrado exitósamente');
		Flight::redirect("/estudiantes?message=$message");
	}
}
