<?php

namespace App\Models;

class Teacher extends Person {
	public string $status;
	public string $specialty;
	public string $email;
	public string $phone;
	public string $income;
	public string $vaccines;
	public string $socialPrograms;
	public Area $area;

	function getFirstName(): string {
		return explode(' ', $this->names)[0];
	}

	function getSecondName(): string {
		return explode(' ', $this->names)[1] ?? '';
	}

	function getFirstLastName(): string {
		return explode(' ', $this->lastnames)[0];
	}

	function getSecondLastName(): string {
		return explode(' ', $this->lastnames)[1] ?? '';
	}

	function toArray(): array {
		return [
			'nombres' => [
				$this->getFirstName(),
				$this->getSecondName()
			],
			'apellidos' => [
				$this->getFirstLastName(),
				$this->getSecondLastName(),
			]
		];
	}

	function __toString(): string {
		return '';
	}
}
