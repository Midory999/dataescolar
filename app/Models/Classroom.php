<?php

namespace App\Models;

class Classroom {
	public int $id;
	public string $name;
	public Teacher $teacher;
}
