<?php

namespace App\Models;

class Area extends Model {
	private ?int $code = null;
	private ?Teacher $teacher = null;
	private ?Classroom $classroom = null;

	function __construct(public readonly string $name) {
	}

	static function parseSlug(string $slug): string {
		return str_replace('-', ' ', $slug);
	}

	function getSlug(): string {
		return str_replace(' ', '-', $this->name);
	}

	function setCode(int $code): void {
		$this->code = $code;
	}

	function getCode(): int {
		return $this->code;
	}

	function setTeacher(Teacher $teacher): void {
		$this->teacher = $teacher;
	}

	function getTeacher(): ?Teacher {
		return $this->teacher;
	}

	function setClassroom(Classroom $classroom): void {
		$this->classroom = $classroom;
	}

	function getClassroom(): ?Classroom {
		return $this->classroom;
	}

	function toArray(): array {
		return [
			'codigo' => $this->code,
			'nombre' => $this->name,
			'profesor' => $this->teacher?->toArray(),
			'aula' => $this->classroom?->toArray()
		];
	}

	function __toString(): string {
		return "$this->code - $this->name";
	}
}
