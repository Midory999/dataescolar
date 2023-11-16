<?php

namespace App\Repositories;

use App\Models\Area;

interface AreaRepository {
	/** @return Area[] */
	function getAll(): array;
}
