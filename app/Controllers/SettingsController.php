<?php

namespace App\Controllers;

use App\Core\Dependencies;
use App\Core\Session;
use App\Core\UI;
use Flight;

final readonly class SettingsController {
	static function showSettings(): void {
		UI::setData('error', Flight::request()->query['error']);
		UI::setData('thereIsBackup', Dependencies::getSettingRepository()->hasBackup());
		UI::render('settings');
	}

	static function backup(): void {
		if (Dependencies::getSettingRepository()->backup()) {
			Session::set('success', 'Base de datos respaldada exitósamente');
			exit(Flight::redirect('/configuracion'));
		}

		Session::set('error', 'Ha ocurrido un error');
		Flight::redirect('/configuracion');
	}

	static function restore(): void {
		if (Dependencies::getSettingRepository()->restore()) {
			Session::delete('userID');
			Session::set('success', 'Base de datos restaurada exitósamente');

			exit(Flight::redirect('/ingresar'));
		}

		Session::set('error', 'Ha ocurrido un error');
		Flight::redirect('/configuracion');
	}
}
