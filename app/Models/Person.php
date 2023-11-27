<?php

namespace App\Models;

abstract class Person extends Model {
	public int $id;
	public string $names;
	public string $lastnames;
	public int $idCard;
	public string $gender;
	public string $direction;
	public string $bloodType;
	public string $birthDate;
	public string $birthPlace;
	public int $age;

	function getGender(): string {
		return ucfirst($this->gender);
	}
}
