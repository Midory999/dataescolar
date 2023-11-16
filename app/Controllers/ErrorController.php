<?php

namespace App\Controllers;

use App\Core\{Logger, UI};
use Throwable;

class ErrorController {
	static function handle404(): void {
		UI::changeLayout(UI::VISITOR_LAYOUT);
		UI::render('404');
	}

	static function handle500(Throwable $error): void {
		UI::changeLayout(UI::VISITOR_LAYOUT);
		UI::render('500');
		Logger::log($error);
	}
}
