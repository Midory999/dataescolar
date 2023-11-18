<?php

namespace App\Repositories;

use App\Models\Inscription;

class Student {
}
class Period {
}
class Level {
}

interface InscriptionRepository {
	function save(Inscription $inscription): bool;
	/** @return Inscription[] */
	function getAll(): array;
	/** @return Inscription[] */
	function getByID(int $id): ?Inscription;
	function getAllStudent(Student $student): array;
	function getAllPeriod(Period $period): array;
	function getAllLevel(Level $level): array;
}
