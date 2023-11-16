<?php

namespace App\Repositories;

use App\Models\Teacher;

interface TeacherRepository {
	/** @return Teacher[] */
	function getAll(): array;
	function getByIDCard(int $idCard): ?Teacher;
	function getByID(int $id): ?Teacher;
	function save(Teacher $teacher): bool;
}
