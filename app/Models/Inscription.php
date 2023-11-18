<?php

namespace App\Models;

class Inscription {
	public int $id;
	public string $name;
	public Student $student;
	public Period $period;
	public Level $level;
}
