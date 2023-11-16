<?php

namespace App\Repositories;

use App\Models\Period;

interface PeriodRepository {
	function save(Period $period): bool;
	/** @return Period[] */
	function getAll(): array;
	function getLatest(): ?Period;
	function getByID(int $id): ?Period;
}
