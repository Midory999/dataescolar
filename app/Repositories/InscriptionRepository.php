<?php

namespace App\Repositories;

use App\Models\Inscription;

interface InscriptionRepository {
	function save(Inscription $inscription): bool;
	/** @return Inscription[] */
	function getAll(): array;
	/** @return Inscription[] */
	function getByID(int $id): ?Inscription;
}
