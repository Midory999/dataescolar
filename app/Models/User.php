<?php

namespace App\Models;

use App\Core\Dependencies;
use App\Core\UUID;

/**
 * Un usuario del sistema
 * @property-read string $id
 * @property-read string $name
 * @property-read string $lastname
 * @property-read int $idCard
 * @property-read string $password
 * @property-read string $role
 * @property-read string $question
 * @property-read string $answer
 */
class User {
	function __construct(
		private UUID $id,
		private string $name,
		private string $lastname,
		private int $idCard,
		private string $password,
		private Role $_role,
		private string $question,
		private string $answer
	) {}

	/** Permite leer las propiedades privadas */
	function __get(string $property): ?string {
		return match ($property) {
			'id' => $this->id,
			'role' => $this->_role->value,
			default => property_exists($this, $property) ? $this->$property : null
		};
	}

	/** Asigna una contraseña encriptada */
	function setEncryptedPassword(string $hash): void {
		$this->password = $hash;
	}

	/**
	 * Verifica que una contraseña sin encriptar coincida con la contraseña de este
	 * usuario
	 */
	function isValidPassword(string $raw): bool {
		return Dependencies::getEncryptor()->verify($raw, $this->password);
	}

	/**
	 * Crea un Usuario partiendo de datos provenientes de una petición POST
	 * @param array<string, string> $post
	 */
	static function fromPOST(array $post): self {
		return new self(
			new UUID,
			$post['nombre'],
			$post['apellido'],
			(int) $post['cedula'],
			Dependencies::getEncryptor()->encrypt($post['clave']),
			Role::from($post['rol']),
			$post['pregunta'],
			Dependencies::getEncryptor()->encrypt($post['respuesta'])
		);
	}

	/**
	 * Crea un Usuario partiendo de datos provenientes de un sistema de persistencia
	 * @param array<string, string> $info
	 */
	static function fromDB(array $info): self {
		return new self(
			new UUID($info['id']),
			$info['nombre'],
			$info['apellido'],
			(int) $info['cedula'],
			$info['clave'],
			Role::from($info['rol']),
			$info['pregunta'],
			$info['respuesta']
		);
	}
}
