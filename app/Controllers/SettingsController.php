<?php

namespace App\Controllers;

use App\Core\Dependencies;
use App\Core\UI;
use Flight;

class SettingsController {
	static function showSettings(): void {
		UI::setData('error', Flight::request()->query['error']);
		UI::setData('thereIsBackup', Dependencies::getSettingRepository()->hasBackup());
		UI::render('settings');
	}

	static function backup(): void {
		if (Dependencies::getSettingRepository()->backup()) {
			Flight::redirect('/configuracion');
			return;
		}

		$error = urlencode('Ha ocurrido un error');
		Flight::redirect("/configuracion?error=$error");
	}

	static function restore(): void {
		if (Dependencies::getSettingRepository()->restore()) {
			Flight::redirect('/salir');
			return;
		}

		$error = urlencode('Ha ocurrido un error');
		Flight::redirect("/configuracion?error=$error");
	}
}
