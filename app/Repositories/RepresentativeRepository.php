<?php

namespace App\Repositories;

use App\Models\Representative;

interface RepresentativeRepository {
	/** @return Representative[] */
	function getAll(): array;
	function getByIDCard(int $idCard): ?Representative;
	function getByID(int $id): ?Representative;
	function save(Representative $representative): bool;
}
