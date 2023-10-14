<?php

namespace App\Core;

use Stringable;
use Symfony\Component\Uid\UuidV4;

class UUID implements Stringable {
	private UuidV4 $uuid;

	function __construct(?string $from = null) {
		$this->uuid = new UuidV4($from);
	}

	function __toString(): string {
		return $this->uuid;
	}
}
