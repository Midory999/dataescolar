<?php

namespace App\Models;

class Level {
	public int $code;

	public string $name;

	static function create(int $code, string $name): self {
		$level = new self;
		$level->code = $code;
		$level->name = $name;

		return $level;
	}
}
