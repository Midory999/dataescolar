<?php

namespace App\Models;

class Representative extends Person {
	public string $email;
	public string $phone;
	public string $ocupation;
	public string $jobPlace;
	public string $studies;

	function toArray(): array {
		return [];
	}

	function __toString(): string {
		return "$this->names $this->lastnames";
	}

	function getStudies(): string {
		return ucfirst($this->studies);
	}
}
