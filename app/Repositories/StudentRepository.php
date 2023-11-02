<?php

namespace App\Repositories;

use App\Models\Student;

interface StudentRepository {
	/** @return Student[] */
	function getAll(): array;
	function getByIDCard(int $idCard): ?Student;
	function save(Student $student): bool;
}
