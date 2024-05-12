<?php

namespace App\Core;

/** Operaciones de escritura y lectura de valores en Sesión */
class Session {
	static function has(string $key): bool {
		self::restore();

		return isset($_SESSION[$key]);
	}

	/**
	 * Operación de lectura de una variable de sesión
	 * @param  string $key Nombre de la variable
	 * @return ?string     **Valor de la variable** o **NULL** si no existe
	 */
	static function get(string $key): ?string {
		self::restore();
		$value = @$_SESSION[$key];
		return is_string($value) ? $value : null;
	}

	static function getAndDelete(string $key): ?string {
		$value = self::get($key);
		self::delete($key);

		return $value;
	}

	/**
	 * Operación de escritura de una variable de sesión
	 * @param string            $key   Nombre de la variable
	 * @param bool|float|string $value Valor de la variable
	 */
	static function set(string $key, bool|float|string $value): void {
		self::restore();
		$_SESSION[$key] = "$value";
	}

	/**
	 * Operación de eliminación de una variable de sesión
	 * @param  string $key Nombre de la variable
	 */
	static function delete(string $key): void {
		self::restore();
		$_SESSION[$key] = null;
	}

	/** Operación de limpieza de la sesión */
	static function clean(): void {
		self::restore();
		session_destroy();
	}

	/** Operación privada de la restauración de una sesión anterior */
	private static function restore(): void {
		@session_start();
	}
}
