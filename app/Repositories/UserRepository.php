<?php

namespace App\Repositories;

use App\Core\UUID;
use App\Models\User;

interface UserRepository {
	function save(User $user): bool;
	/** @return User[] */
	function getAll(): array;
	function getByIDCard(int $idCard): ?User;
	function getByID(UUID $id): ?User;
}
