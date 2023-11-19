<?php

namespace App\Models;

class Report {
	public $id;
	public $student;
	public $teacher;
	public $area;
	public $level;

	public function __construct($id, $student, $teacher, $area, $level) {
		$this->id = $id;
		$this->student = $student;
		$this->teacher = $teacher;
		$this->area = $area;
		$this->level = $level;
	}

	// Métodos getter y setter para cada propiedad

}
