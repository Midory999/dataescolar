<?php

namespace App\Models;

use AllowDynamicProperties;

#[AllowDynamicProperties]
final class Student extends Person {
	public string $birthType;
	public string $compromises;
	public string $medicines;
	public string $measurements;
	public string $vaccines;
	public string $socialPrograms;
	/** @var string Fecha en la que ingresó por primera vez */
	public string $admission;
	public bool $status;
	public string $description;
	public Representative $representative;

	function toArray(): array {
		return [];
	}

	function __toString(): string {
		return '';
	}

	function getBirthType(): string {
		return ucfirst($this->birthType);
	}

	function getCompromises(): string {
		return ucfirst(str_replace('_', ' ', $this->compromises));
	}

	function getVaccines(): string {
		return ucfirst($this->vaccines);
	}

	function getSocialPrograms(): string {
		return ucfirst($this->socialPrograms === 'ninguna' ? 'ninguno' : $this->socialPrograms);
	}

	function getStatus(): string {
		return $this->status ? 'Activo' : 'Retirado';
	}
}
