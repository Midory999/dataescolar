<?php

namespace App\Core;

use App\Core\Encryptors\PHPEncryptor;
use App\Repositories\MySQL\MySQLUserRepository;
use App\Repositories\UserRepository;

class Dependencies {
	static function getUserRepository(): UserRepository {
		return new MySQLUserRepository;
	}

	static function getEncryptor(): Encryptor {
		return new PHPEncryptor;
	}
}
