<?php

namespace App\Core;

// Dependencia de este módulo
use Symfony\Component\Dotenv\Dotenv;

/**
 * Operaciones relacionadas con la carga y lectura de variables de entorno del sistema.
 */
class Env {
	/**
	 * Operación de lectura de variable de entorno
	 * @param  string $key Nombre de la variable
	 * @return ?string     **El valor de la variable** o **NULL** si no existe
	 */
	static function get(string $key): ?string {
		if (@$_SESSION[$key] === null) {
			self::loadVariables();
		}

		$value = @$_ENV[$key];
		return is_string($value) ? $value : null;
	}

	/** Operación privada de carga de variables de entorno */
	private static function loadVariables(): void {
		(new Dotenv)->load(__DIR__ . '/../../.env.local');
	}
}
