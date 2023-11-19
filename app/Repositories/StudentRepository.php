<?php

namespace App\Repositories;

use App\Models\Student;

interface StudentRepository {
	const TABLE = 'Estudiantes';
	const PRIMARY_KEY = 'id';
	const REPRESENTATIVE_FOREIGN_KEY = 'id_Representante';

	/** @return Student[] */
	function getAll(): array;
	function getByIDCard(int $idCard): ?Student;
	function save(Student $student): bool;
	function getByID(int $id): ?Student;
}
