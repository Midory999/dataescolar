<?php

namespace App\Repositories;

use App\Models\Area;
use App\Models\Teacher;

interface TeacherRepository {
	const TABLE = 'profesores';
	const PRIMARY_KEY = 'id';
	const AREA_FOREIGN_KEY = 'codigo_area';

	/** @return Teacher[] */
	function getAll(): array;
	function getByIDCard(int $idCard): ?Teacher;
	function getByID(int $id): ?Teacher;
	function save(Teacher $teacher): bool;
	function setTeacherTo(Area $area): void;
}
