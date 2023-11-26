<?php

namespace App\Repositories;

use App\Models\Classroom;

interface ClassroomRepository {
	/** @return Classroom[] */
	function getAll(): array;
	function getByID(int $id): ?Classroom;
	function save(Classroom $classroom): bool;


}
