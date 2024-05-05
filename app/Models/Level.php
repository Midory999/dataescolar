<?php

namespace App\Models;

class Level {
	public ?int $id = null;

	public string $code;

	static function create(int $id, string $code, string $level): self {
		$level = new self;
		$level->code = $code;
		$level->id = $id;
		return $level;
	}

	function hasId(): bool {
		return $this->id !== null;
	}
}
