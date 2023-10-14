<?php

namespace App\Core;

use Flight;

class UI {
	static function render(string $page, ?array $data = null): void {
		$data['root'] = '/dataescolar';
		Flight::render("pages/$page", $data, 'content');
		Flight::render('layout', ['assets' => '/dataescolar/assets']);
	}
}
