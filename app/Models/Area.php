<?php

namespace App\Models;

class Area {
	public int $code;
	public string $name;

	static function create(int $code, string $name): self {
		$area = new self;
		$area->code = $code;
		$area->name = $name;

		return $area;
	}
}
