<?php

namespace App\Models;

class Inscription {
	public int $id;
	public Student $student;
	public Period $period;
	public Level $level;

	public function __construct($id, $student, $period, $level) {
		$this->id = $id;
		$this->student = $student;
		$this->period = $period;
		$this->level = $level;
	}
}
