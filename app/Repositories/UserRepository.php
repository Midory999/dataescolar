<?php

namespace App\Repositories;

use App\Core\UUID;
use App\Models\User;

/** Operaciones de lectura y escritura de Usuarios en un sistema de persistencia */
interface UserRepository {
	/** Guarda un usuario en persistencia */
	function save(User $user): bool;
	/**
	 * Obtiene una lista de usuarios de un sistema de persistencia
	 * @return User[]
	 */
	function getAll(): array;

	/**
	 * Obtiene un usuario por Cédula de Identidad
	 * @param  int    $idCard Cédula de identidad
	 * @return ?User          El **User** o **NULL** si no fue encontrado
	 */
	function getByIDCard(int $idCard): ?User;

	/**
	 * Obtiene un usuario por UUID
	 * @param  UUID   $id Identificador del Usuario
	 * @return ?User      El **User** o **NULL** si no fue encontrado
	 */
	function getByID(UUID $id): ?User;
}
