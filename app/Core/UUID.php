<?php

namespace App\Core;

// Dependencias de este módulo
use Stringable;
use Symfony\Component\Uid\UuidV4;

/**
 * Implementación de **Universal Unique Identification**. _Este módulo se puede
 * convertir en un string_
 */
class UUID implements Stringable {
	private UuidV4 $uuid;

	/**
	 * Crea un nuevo UUID o construye a partir de un existente
	 * @param string|null $from Un UUID ya existente
	 */
	function __construct(?string $from = null) {
		$this->uuid = new UuidV4($from);
	}

	function __toString(): string {
		return $this->uuid;
	}
}
