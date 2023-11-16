<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Models\Period;
use Flight;

class PeriodController {
	static function showPeriodRegister(): void {
		UI::render('period-register');
	}

	static function showPeriods(): void {
		UI::render('periods', ['periods' => Dependencies::getPeriodRepository()->getAll()]);
	}

	static function registerPeriod(): void {
		$post = Flight::request()->data->getData();
		$period = new Period(null, $post['inicio']);
		$result = Dependencies::getPeriodRepository()->save($period);

		if ($result) {
			Flight::redirect('/periodos');
			return;
		}

		$error = urlencode('Ha ocurrido un error');
		Flight::redirect("/periodos?error=$error");
	}
}
