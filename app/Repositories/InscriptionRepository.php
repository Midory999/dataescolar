<?php

namespace App\Repositories;

use App\Models\Inscription;

interface InscriptionRepository {
	const TABLE = 'Inscripciones';
	const PRIMARY_KEY = 'id';
	const STUDENT_FOREIGN_KEY = 'id_estudiante';
	const PERIOD_FOREIGN_KEY = 'id_periodo';
	const LEVEL_FOREIGN_KEY = 'id_nivel';

	function save(Inscription $inscription): bool;
	/** @return Inscription[] */
	function getAll(): array;
	/** @return Inscription[] */
	function getByID(int $id): ?Inscription;
}
