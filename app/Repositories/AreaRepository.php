<?php

namespace App\Repositories;

use App\Models\Area;

interface AreaRepository {
	/** @return Area[] */
	function getAll(): array;
	function getByCode(int $code): ?Area;
	function save(Area $area): bool;
}
