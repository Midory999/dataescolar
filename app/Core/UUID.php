<?php

namespace App\Core;

use Stringable;
use Symfony\Component\Uid\UuidV4;

class UUID implements Stringable {
	private UuidV4 $uuid;

	function __construct() {
		$this->uuid = new UuidV4;
	}

	function __toString(): string {
		return $this->uuid;
	}
}
