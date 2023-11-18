<?php

namespace App\Repositories;

use App\Models\Level;

interface LevelRepository {
	/** @return Level[] */
	function getAll(): array;
	function getByCode(int $code): ?Level;
	function save(Level $level): bool;
}
