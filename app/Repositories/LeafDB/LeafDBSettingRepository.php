<?php

namespace App\Repositories\LeafDB;

use App\Core\Env;
use App\Core\Logger;
use App\Models\School;
use App\Models\SchoolCodes;
use App\Repositories\SettingRepository;
use ErrorException;
use PDO;

class LeafDBSettingRepository extends LeafDBConnection implements SettingRepository {
	function backup(): bool {
		switch ($this->getConnectionType()) {
			case 'sqlite':
				$dbPath = __DIR__ . '/../SQLite/' . Env::get('DB_DATABASE');
				parent::$db = null;
				copy($dbPath, "$dbPath.bak");
				return true;

			case 'mysql':
				$backupPath = dirname(__DIR__) . '/MySQL/backup.sql';
				$output = `{$_ENV['MYSQLDUMP_PATH']} --user={$_ENV['DB_USERNAME']} --password={$_ENV['DB_PASSWORD']} {$_ENV['DB_DATABASE']}`;
				file_put_contents($backupPath, $output);

				return true;

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
			case 'mysql':
				$backupPath = dirname(__DIR__) . '/MySQL/backup.sql';
				$queries = file_get_contents($backupPath);

				$pdo = self::db()->connection();
				assert($pdo instanceof PDO);

				foreach (explode(';', $queries) as $query) {
					$query && $pdo->query($query);
				}

				return true;
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
				$backupPath = dirname(__DIR__) . '/MySQL/backup.sql';

				return file_exists($backupPath);
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
