<?php

namespace App\Core;

use Throwable;

class Logger {
	static function log(string|Throwable $error): void {
		// if ($error instanceof Throwable) {
		// 	$error = $error->getMessage();
		// }

		error_log($error);
	}

	static function activate(): void {
		ini_set('error_log', __DIR__ . '/Errors/php_errors.log');
	}
}
