<?php

namespace App\Models;

use Stringable;

abstract class Model implements Stringable {
	abstract function toArray(): array;
}
