<?php

namespace App\Controllers;

use App\Core\Dependencies;
use App\Core\UI;
use App\Models\Period;
use Flight;

class PeriodController {
	function showPeriodRegister(): void {
		UI::changeLayout(UI::APP_LAYOUT);
		UI::render('period-register');
	}

	function showPeriods(): void {
		UI::changeLayout(UI::APP_LAYOUT);
		UI::render(
			'periods',
			['periods' => Dependencies::getPeriodRepository()->getAll()]
		);
	}

	function registerPeriod(): void {
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
