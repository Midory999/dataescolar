<?php

namespace App\Core\Encryptors;

use App\Core\Encryptor;

/** Encriptador recomendado por PHP */
class PHPEncryptor implements Encryptor {
	function encrypt(string $input): string {
		return password_hash($input, PASSWORD_DEFAULT);
	}

	function verify(string $raw, string $hash): bool {
		return password_verify($raw, $hash);
	}
}
