<?php

namespace App\Repositories;

use App\Models\Lapse;

interface LapseRepository {
	/** @return Lapse[] */
	function getAll(): array;
	function getByID(int $id): ?Lapse;
	function save(Lapse $lapse): bool;
}
