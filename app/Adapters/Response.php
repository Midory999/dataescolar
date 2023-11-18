<?php

namespace App\Adapters;

use Flight;

class Response {
	static function json(mixed $data, int $status = 200): never {
		Flight::json($data, $status, true, 'utf8', JSON_UNESCAPED_UNICODE);
		exit;
	}
}
