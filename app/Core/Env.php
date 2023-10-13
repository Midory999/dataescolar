<?php

namespace App\Core;

use Symfony\Component\Dotenv\Dotenv;

class Env {
	static function get(string $key): ?string {
		if (@$_SESSION[$key] === null) {
			self::loadVariables();
		}

		return @$_ENV[$key];
	}

	private static function loadVariables(): void {
		(new Dotenv)->load(__DIR__ . '/../../.env.local');
	}
}
