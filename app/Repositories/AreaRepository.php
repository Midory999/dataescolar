<?php

namespace App\Repositories;

use App\Models\Area;

interface AreaRepository {
	/** @return Area[] */
	function getAll(): array;
	function getByIDCard(int $idCard): ?Area;
	function getByID(int $id): ?Area;
	function save(Area $area): bool;
}