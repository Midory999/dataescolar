<?php

namespace App\Core;

interface Encryptor {
	function encrypt(string $input): string;
	function verify(string $raw, string $hash): bool;
}
