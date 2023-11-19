<?php

namespace App\Repositories;

use App\Exceptions\DuplicatedRecordException;
use App\Models\Area;

interface AreaRepository {
	const TABLE = 'areas';
	const PRIMARY_KEY = 'codigo';

	/** @return Area[] */
	function getAll(): array;
	/** @return array<int, array<string, int|string>> */
	function getAllAsArray(): array;
	function getByCode(int $code): ?Area;
	function getBySlug(string $slug): ?Area;
	/** @throws DuplicatedRecordException */
	function save(Area $area): Area;
	/** @param array<string, string> $info */
	function mapper(array $info): Area;
	function setTeacherRepository(TeacherRepository $teacherRepository): static;
	function setClassroomRepository(ClassroomRepository $classroomRepository): static;
}
