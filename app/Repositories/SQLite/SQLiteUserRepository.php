<?php

namespace App\Repositories\SQLite;

use App\Core\UUID;
use App\Models\User;
use App\Repositories\UserRepository;
use SQLite3;
use Throwable;

class SQLiteUserRepository implements UserRepository {
	private static ?SQLite3 $db = null;

	function __construct() {
		if (self::$db === null) {
			self::$db = new SQLite3(__DIR__ . '/dataescolar.db');
			self::prepareDB();
		}
	}

	function save(User $user): bool {
		if (self::$db === null) {
			return false;
		}

		$sql = <<<SQL
			INSERT INTO usuarios VALUES (
				'$user->id',
				'$user->name',
				'$user->lastname',
				'$user->idCard',
				'$user->password',
				'$user->role',
				'$user->question',
				'$user->answer'
			)
		SQL;

		try {
			self::$db->query($sql);
			return true;
		} catch (Throwable) {
			return false;
		}
	}

	function getAll(): array {
		if (self::$db === null) {
			return [];
		}

		$result = self::$db->query('SELECT * FROM usuarios');

		if ($result === false) {
			return [];
		}

		$users = [];
		while ($userInfo = $result->fetchArray(SQLITE3_ASSOC)) {
			$users[] = $this->mapper($userInfo);
		}

		return $users;
	}

	function getByIDCard(int $idCard): ?User {
		$sql = "SELECT * FROM usuarios WHERE cedula=$idCard";
		return $this->getByCriteria($sql);
	}

	function getByID(UUID $id): ?User {
		$sql = "SELECT * FROM usuarios WHERE id='$id'";
		return $this->getByCriteria($sql);
	}

	private function getByCriteria(string $sql): ?User {
		if (self::$db === null) {
			return null;
		}

		$result = self::$db->query($sql);

		if ($result === false) {
			return null;
		}

		$userInfo = $result->fetchArray(SQLITE3_ASSOC);

		if ($userInfo === false) {
			return null;
		}

		return $this->mapper($userInfo);
	}

	private static function prepareDB(): void {
		if (self::$db === null) {
			return;
		}

		$queries = explode(';', (string) file_get_contents(__DIR__ . '/init.sql'));
		foreach ($queries as $query) {
			self::$db->query($query);
		}
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): User {
		return User::fromRepository($info);
	}
}
