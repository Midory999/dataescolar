<?php

namespace App\Repositories;

use App\Models\Inscription;
use App\Models\Student;

interface InscriptionRepository {
	function save(Inscription $inscription): bool;
	/** @return Inscription[] */
	function getAll(): array;
	/** @return Inscription[] */
	function getAllFrom(Student $student): array;
}
