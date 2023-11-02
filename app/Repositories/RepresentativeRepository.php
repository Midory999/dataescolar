<?php

namespace App\Repositories;

use App\Models\Representative;

interface RepresentativeRepository {
	/** @return Representative[] */
	function getAll(): array;
	function getByIDCard(): ?Representative;
	function save(Representative $representative): bool;
}
