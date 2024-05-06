<?php

namespace App\Models;

use DateTimeImmutable;

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

	function getGender(): string {
		return ucfirst($this->gender);
	}

	function __get(string $property): mixed {
		if ($property === 'age') {
			$fechaNacimiento = new DateTimeImmutable($this->birthDate);
			$fechaNacimiento = $fechaNacimiento->getTimestamp();
			$fechaActual = time();
			$diferencia = $fechaActual - $fechaNacimiento;
			$edad = date('Y', (int) $diferencia) - 1970;

			return $edad;
		}

		return null;
	}
}
