<?php

namespace App\Models;

class Report {
	public int $id;
	public Student $student;
	public Teacher $teacher;
	public Area $area;
	public Level $level;

	public function __construct($id, $student, $teacher, $area, $level) {
		$this->id = $id;
		$this->student = $student;
		$this->teacher = $teacher;
		$this->area = $area;
		$this->level = $level;
	}

	// Métodos getter y setter para cada propiedad

}
