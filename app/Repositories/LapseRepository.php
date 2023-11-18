<?php

namespace App\Repositories;

use App\Exceptions\DuplicatedRecordException;
use App\Models\Lapse;
use App\Models\Period;

interface LapseRepository {
	const TABLE = 'lapsos';
	const PRIMARY_KEY = 'id';

	/** @throws DuplicatedRecordException */
	function save(Lapse $lapse): Lapse;
	/** @return Lapse[] */
	function getAll(): array;
	// /** @return array<int, array<string, int|string>> */
	// function getAllAsArrays(): array;
	function getByID(int $id): ?Lapse;
}
