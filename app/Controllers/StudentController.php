<?php

namespace App\Controllers;

use App\Core\Dependencies;
use App\Core\UI;
use App\Models\Student;
use Flight;

class StudentController {
	function showStudents(): void {
		$students = Dependencies::getStudentRepository()->getAll();

		UI::render('students', compact('students'));
	}

	function showRegisterForm(): void {
		$representatives = Dependencies::getRepresentativeRepository()->getAll();

		UI::render('student-register', compact('representatives'));
	}

	function registerStudent(): void {
		$info = Flight::request()->data->getData();

		$student = new Student;
		$student->representative = Dependencies::getRepresentativeRepository()->getByID(
			$info['id_representante']
		);
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
		$student->measurements = $info['medidas'];
		$student->vaccines = $info['vacunas'];
		$student->socialPrograms = $info['programas_sociales'];
		$student->admission = $info['ingreso'];
		$student->status = $info['estatus'] === 'activo' ? true : false;
		$student->description = $info['descripcion'];

		Dependencies::getStudentRepository()->save($student);
		Flight::redirect('/estudiantes');
	}
}
