<?php

namespace App\Repositories;

use App\Models\Report;

interface ReportRepository {
	const TABLE = 'Informes';
	const PRIMARY_KEY = 'id';
	const STUDENT_FOREIGN_KEY = 'id_Estudiante';
	const TEACHER_FOREIGN_KEY = 'id_Profesor';
	const AREA_FOREIGN_KEY = 'codigo_Area';
	const LEVEL_FOREIGN_KEY = 'id_Nivel';

	function getAll(): array;
	function getByID($id): ?Report;
	function save(Report $report): void;
}
