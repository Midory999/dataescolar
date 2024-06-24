<?php

namespace App\Models;

class Area extends Model {
	private ?int $code = null;
	private ?Teacher $teacher = null;
	private ?Classroom $classroom = null;

	function __construct(private string $name) {
	}

	static function parseSlug(string $slug): string {
		return str_replace('-', ' ', $slug);
	}

	function hasCode(): bool {
		return $this->code !== null;
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

	function getName(): string {
		return $this->name;
	}

	function setClassroom(Classroom $classroom): void {
		$this->classroom = $classroom;
	}

	function getClassroom(): ?Classroom {
		return $this->classroom;
	}

	function setName(string $name): void {
		$this->name = $name;
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

	function __get(string $property): ?string {
		return $property === 'name' ? $this->name : null;
	}
}
