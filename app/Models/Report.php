<?php

namespace App\Models;

final readonly class Report {
	public function __construct(
		public int $id,
		public Student $student,
		public Teacher $teacher,
		public Area $area,
		public Level $level,
		public string $diagnostic,
		public string $lapse1,
		public string $lapse2,
		public string $lapse3,
		public string $finalInform
	) {
	}
}
