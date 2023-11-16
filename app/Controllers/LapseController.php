<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Lapse;
use Flight;

class LapseController {
	static function showLapses(): void {
		$lapses = Dependencies::getLapseRepository()->getAll();

		$message = Flight::request()->query['message'];

		UI::render('lapses', compact('lapses', 'message'));
	}

	static function showRegisterForm(): void {
		$periods = Dependencies::getPeriodRepository()->getAll();

		UI::render('lapse-register', compact('periods'));
	}

	static function registerLapse(): void {
		$info = Flight::request()->data->getData();

		$lapse = new Lapse;
		$lapse->period = Dependencies::getPeriodRepository()->getByID($info['id_periodo']);
		$lapse->start = $info['inicio'];
		$lapse->end = $info['fin'];
		$lapse->name = $info['nombre'];

		Dependencies::getLapseRepository()->save($lapse);

		$message = urlencode('Lapso registrado exitósamente');
		Flight::redirect("/lapsos?message=$message");
	}
}
