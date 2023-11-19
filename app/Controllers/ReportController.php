<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Report;
use Flight;

class ReportController {
	static function showReports(): void {
		$reports = Dependencies::getReportRepository()->getAll();

		$message = Flight::request()->query['message'];

		UI::render('reports', compact('reports', 'message'));
	}

	static function showRegisterForm(): void {
		$students = Dependencies::getStudentRepository()->getAll();
		$teachers = Dependencies::getTeacherRepository()->getAll();
		$areas = Dependencies::getAreaRepository()->getAll();
		$levels = Dependencies::getLevelRepository()->getAll();


		UI::render('report-register', compact('students', 'teachers', 'areas', 'levels'));
	}


	static function registerReport(): void {
		$info = Flight::request()->data->getData();
		$student = Dependencies::getStudentRepository()->getByIDCard($info['id_estudiante']);
		$teacher = Dependencies::getTeacherRepository()->getByID($info['id_teacher']);
		$area = Dependencies::getAreaRepository()->getByCode($info['cod_rea']);
		$level = Dependencies::getLevelRepository()->getByID($info['id_level']);

		$report = new Report;
		$report->student = $student;
		$report->teacher = $teacher;
		$report->area = $area;
		$report->level = $level;

		Dependencies::getReportRepository()->save($report);

		$message = urlencode('Informe registrado exitósamente');
		Flight::redirect("/reports?message=$message");
	}
}
