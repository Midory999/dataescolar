<?php

namespace App\Controllers;

use App\Core\Dependencies;
use App\Core\UI;
use Flight;

class SettingsController {
	function showSettings(): void {
		UI::changeLayout(UI::APP_LAYOUT);
		UI::setData('error', Flight::request()->query['error']);
		UI::render('settings');
	}

	function backup(): void {
		if (Dependencies::getSettingRepository()->backup()) {
			Flight::redirect('/configuracion');
			return;
		}

		$error = urlencode('Ha ocurrido un error');
		Flight::redirect("/configuracion?error=$error");
	}

	function restore(): void {
		if (Dependencies::getSettingRepository()->restore()) {
			Flight::redirect('/salir');
			return;
		}

		$error = urlencode('Ha ocurrido un error');
		Flight::redirect("/configuracion?error=$error");
	}
}
