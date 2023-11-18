<?php

namespace App\Controllers;

use App\Core\{Dependencies, UI};
use App\Exceptions\DuplicatedRecordException;
use App\Models\Period;
use Flight;

class PeriodController {
	static function showPeriodRegister(): void {
		UI::render('period-register');
	}

	static function showPeriods(): void {
		$periods = Dependencies::getPeriodRepository()->getAll();

		UI::render('periods', compact('periods'));
	}

	static function registerPeriod(): void {
		$info = Flight::request()->data;
		$period = new Period($info['inicio']);

		try {
			Dependencies::getPeriodRepository()->save($period);
			Flight::redirect('/periodos');
		} catch (DuplicatedRecordException $error) {
			$error = urlencode($error->getMessage());
			Flight::redirect("/periodos?error=$error");
		}
	}
}
