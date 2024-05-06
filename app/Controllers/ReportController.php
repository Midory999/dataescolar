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
		$student = Dependencies::getStudentRepository()->getByID($info['id_estudiante']);
		$teacher = Dependencies::getTeacherRepository()->getByID($info['id_profesor']);
		$area = Dependencies::getAreaRepository()->getByCode($info['codigo_area']);
		$level = Dependencies::getLevelRepository()->getByID($info['id_nivel']);

		$report = new Report(
			$info['id'],
			$student,
			$teacher,
			$area,
			$level,
			$info['diagnostico'],
			$info['lapso1'],
			$info['lapso2'],
			$info['lapso3'],
			$info['informe_final']
		);

		Dependencies::getReportRepository()->save($report);

		$message = urlencode('Informe registrado exitósamente');
		Flight::redirect("/informes?message=$message");
	}
}
