<?php

namespace App\Core;

use App\Core\Encryptors\PHPEncryptor;
use App\Repositories\LeafDB\LeafDBUserRepository;
use App\Repositories\SQLite\SQLiteUserRepository;
use App\Repositories\UserRepository;

/** Responsable de retornar implementaciones de infraestructura del sistema */
class Dependencies {
	/** Retorna un Repositorio válido de usuarios */
	static function getUserRepository(): UserRepository {
		return new LeafDBUserRepository; # <-- NOTE: Intercambiable
	}

	/** Retorna un Encriptador válido */
	static function getEncryptor(): Encryptor {
		return new PHPEncryptor; # <-- NOTE: Intercambiable
	}
}
