<?php

namespace App\Repositories;

use App\Exceptions\DuplicatedRecordException;
use App\Models\Period;

interface PeriodRepository {
	const TABLE = 'periodos';
	const PRIMARY_KEY = 'id';

	/** @throws DuplicatedRecordException */
	function save(Period $period): Period;
	/** @return Period[] */
	function getAll(): array;
	/** @return array<int, array<string, int>> */
	function getAllAsArrays(): array;
	function getLatest(): ?Period;
	function getByID(int $id): ?Period;
	function mapper(array $info): Period;
	function ensureThereIsOnePeriod(): static;
}
