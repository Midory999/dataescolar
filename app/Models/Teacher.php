<?php

namespace App\Models;

use AllowDynamicProperties;
use DateTimeImmutable;

#[AllowDynamicProperties]
class Teacher extends Person {
	public string $status;
	public string $specialty;
	public string $email;
	public string $phone;
	public string $income;
	public string $vaccines;
	public string $socialPrograms;
	public Area $area;
	public string $independenceCode;

	function getFirstName(): string {
		return mb_convert_case(explode(' ', $this->names)[0], MB_CASE_TITLE);
	}

	function getSecondName(): string {
		return mb_convert_case(explode(' ', $this->names)[1] ?? '', MB_CASE_TITLE);
	}

	function getFirstLastName(): string {
		return mb_convert_case(explode(' ', $this->lastnames)[0], MB_CASE_TITLE);
	}

	function getSecondLastName(): string {
		return mb_convert_case(explode(' ', $this->lastnames)[1] ?? '', MB_CASE_TITLE);
	}

	function getID(): int {
		return $this->id;
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

	function isAdmin(): false {
		return false;
	}

	function isValidPassword(string $password): bool {
		$birthDate = new DateTimeImmutable($this->birthDate);
		$format = "$this->idCard-{$birthDate->format('Y')}-$this->independenceCode";

		return $password === $format;
	}

	function __toString(): string {
		return "$this->names $this->lastnames";
	}
}
