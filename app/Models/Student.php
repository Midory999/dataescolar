<?php

namespace App\Models;

class Student extends Person {
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
}
