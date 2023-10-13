<?php

namespace App\Core;

class Session {
	static function get(string $key): ?string {
		self::restore();
		return @$_SESSION[$key];
	}

	static function set(string $key, bool|float|string $value): void {
		self::restore();
		$_SESSION[$key] = "$value";
	}

	static function delete(string $key): void {
		self::restore();
		$_SESSION[$key] = null;
	}

	static function clean(): void {
		self::restore();
		session_destroy();
	}

	private static function restore(): void {
		@session_start();
	}
}
