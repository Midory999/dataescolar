<?php

namespace App\Models;

class Classroom extends Model {
	private ?int $id = null;

	function __construct(
		public readonly string $name,
		public readonly Teacher $teacher
	) {
	}

	function getID(): ?int {
		return $this->id;
	}

	function setID(int $id): void {
		$this->id = $id;
	}

	function toArray(): array {
		return [
			'id' => $this->id,
			'nombre' => $this->name,
		];
	}

	function __toString(): string {
		return "$this->name";
	}
}
