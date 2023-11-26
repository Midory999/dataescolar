<?php

namespace App\Models;

class Lapse extends Model {
	private ?int $id = null;

	function __construct(
		public readonly string $name,
		public readonly string $startDate,
		public readonly string $endDate,
		public readonly Period $period
	) {
	}

	function getID(): int {
		return $this->id;
	}

	function setID(int $id): void {
		$this->id = $id;
	}

	function toArray(): array {
		return [
			'id' => $this->id,
			'nombre' => $this->name,
			'inicio' => $this->startDate,
			'fin' => $this->endDate
		];
	}

	function __toString(): string {
		return "$this->name ($this->startDate / $this->endDate)";
	}
}
