<?php

namespace App\Repositories\LeafDB;

use App\Core\Env;
use Leaf\Db;

abstract class LeafDBConnection {
	protected static ?Db $db = null;

	function __construct() {
		if (self::$db === null) {
			self::$db = new Db([
				'dbtype' => Env::get('DB_CONNECTION'),
				'dbname' => __DIR__ . '/../SQLite/' . Env::get('DB_DATABASE')
			]);

			self::prepareDB();
		}
	}

	protected static function db(): Db {
		return self::$db;
	}

	private static function prepareDB(): void {
		assert(self::$db !== null);

		$sqlFile = match (strtolower((string) Env::get('DB_CONNECTION'))) {
			'sqlite' => __DIR__ . '/../SQLite/init.sql',
			'mysql' => __DIR__ . '/../MySQL/init.sql',
			default => throw new \Error('Base de datos no soportada')
		};

		$queries = explode(';', (string) file_get_contents($sqlFile));
		foreach ($queries as $query) {
			if ($query) {
				self::$db->query($query)->execute();
			}
		}
	}
}
