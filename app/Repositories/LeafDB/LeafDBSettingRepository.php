<?php

namespace App\Repositories\LeafDB;

use App\Core\Env;
use App\Core\Logger;
use App\Repositories\SettingRepository;
use ErrorException;

class LeafDBSettingRepository extends LeafDBConnection implements SettingRepository {
	function backup(): bool {
		switch (strtolower(Env::get('DB_CONNECTION'))) {
			case 'sqlite':
				$dbPath = __DIR__ . '/../SQLite/' . Env::get('DB_DATABASE');
				parent::$db = null;;
				copy($dbPath, "$dbPath.bak");
				return true;

				case 'mysql':
					// TODO: Implementar respaldo de mysql
					return false;

					default: return false;
				}
			}

			function restore(): bool {
				switch (strtolower(Env::get('DB_CONNECTION'))) {
					case 'sqlite':
					$dbPath = __DIR__ . '/../SQLite/' . Env::get('DB_DATABASE');
					parent::$db->close();
					parent::$db = null;
					try {
						unlink($dbPath);
						copy("$dbPath.bak", $dbPath);
					} catch (ErrorException $error) {
						Logger::log($error);
					}
					return true;

				case 'mysql:':
					// TODO: Implementar restauración de mysql
					return false;
				return false;

			default: return false;
		}
	}
}
