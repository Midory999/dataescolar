<?php

namespace App\Core;

/** Operaciones generales de un Encriptador */
interface Encryptor {
	/**
	 * Operación de encriptación de un texto
	 * @param  string $input Texto de entrada
	 * @return string        El texto encriptado
	 */
	function encrypt(string $input): string;
	/**
	 * Operación de verificación de textos encriptado y no encriptado
	 * @param  string $raw  Texto sin encriptar
	 * @param  string $hash Texto encriptado
	 * @return bool         Representa si los textos **coinciden** o **no coinciden**
	 */
	function verify(string $raw, string $hash): bool;
}
