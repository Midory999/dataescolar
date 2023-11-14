<?php

namespace App\Repositories\LeafDB;

use App\Core\Env;
use App\Core\Logger;
use App\Models\School;
use App\Models\SchoolCodes;
use App\Repositories\SettingRepository;
use ErrorException;

class LeafDBSettingRepository extends LeafDBConnection implements SettingRepository {
	function backup(): bool {
		switch ($this->getConnectionType()) {
			case 'sqlite':
				$dbPath = __DIR__ . '/../SQLite/' . Env::get('DB_DATABASE');
				parent::$db = null;;
				copy($dbPath, "$dbPath.bak");
				return true;

			case 'mysql':
				// TODO: Implementar respaldo de mysql
				return false;

			default:
				return false;
		}
	}

	function restore(): bool {
		switch ($this->getConnectionType()) {
			case 'sqlite':
				$dbPath = __DIR__ . '/../SQLite/' . Env::get('DB_DATABASE');
				if (file_exists("$dbPath.bak") === false) {
					return false;
				}

				parent::$db->close();
				parent::$db = null;
				try {
					unlink($dbPath);
					copy("$dbPath.bak", $dbPath);
				} catch (ErrorException $error) {
					Logger::log($error);
					return false;
				}

				return true;
			case 'mysql:':
				// TODO: Implementar restauración de mysql
				return false;
			default:
				return false;
		}
	}

	function hasBackup(): bool {
		switch ($this->getConnectionType()) {
			case 'sqlite':
				$dbPath = __DIR__ . '/../SQLite/' . Env::get('DB_DATABASE');
				return file_exists("$dbPath.bak");
			case 'mysql':
				return false;
			default:
				return false;
		}
	}

	function getSchool(): School {
		$schoolInfo = json_decode(file_get_contents(__DIR__ . '/../JSON/school.json'), true);

		$schoolCodes = new SchoolCodes;
		$schoolCodes->circuit = (int) $schoolInfo['codes']['circuit'];
		$schoolCodes->pae = (int) $schoolInfo['codes']['pae'];
		$schoolCodes->dea = (int) $schoolInfo['codes']['dea'];

		$school = new School;
		$school->name = $schoolInfo['name'];
		$school->rif = $schoolInfo['rif'];
		$school->phone = $schoolInfo['phone'];
		$school->codes = $schoolCodes;

		return $school;
	}

	private function getConnectionType(): string {
		return strtolower(Env::get('DB_CONNECTION'));
	}
}
