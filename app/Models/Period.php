<?php

namespace App\Models;

class Period {
	function __construct(private ?int $id, private int $startYear) {}

	function getStartYear(): int {
		return $this->startYear;
	}

	function getEndYear(): int {
		return $this->startYear + 1;
	}

	function getID(): ?int {
		return $this->id;
	}

	function __toString(): string {
		return "{$this->getStartYear()}-{$this->getEndYear()}";
	}
}
