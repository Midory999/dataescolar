<?php

namespace App\Repositories\LeafDB;

use App\Core\Env;
use Leaf\Db;
use RuntimeException;

abstract class LeafDBConnection {
	protected static ?Db $db = null;

	function __construct() {
		if (self::$db === null) {
			self::$db = new Db(self::getDbParams());
		}
	}

	public static function db(): Db {
		return self::$db;
	}

	private static function getDbParams(): array {
		if (strtolower(Env::get('DB_CONNECTION')) === 'sqlite') {
			return [
				'dbtype' => Env::get('DB_CONNECTION'),
				'dbname' => __DIR__ . '/../SQLite/' . Env::get('DB_DATABASE')
			];
		}

		if (strtolower(Env::get('DB_CONNECTION')) === 'mysql') {
			return [
				'dbtype' => Env::get('DB_CONNECTION'),
				'dbname' => Env::get('DB_DATABASE'),
				'host' => Env::get('DB_HOST'),
				'user' => Env::get('DB_USERNAME'),
				'password' => Env::get('DB_PASSWORD'),
				'charset' => Env::get('DB_CHARSET')
			];
		}

		throw new RuntimeException('DBtype ' . Env::get('DB_CONNECTION') . ' not supported');
	}
}
