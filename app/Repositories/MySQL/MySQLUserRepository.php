<?php

namespace App\Repositories\MySQL;

use App\Core\Env;
use App\Core\UUID;
use App\Models\User;
use App\Repositories\UserRepository;
use mysqli;
use mysqli_result;
use mysqli_sql_exception;

/** Implmentación de Persistencia de Usuarios en MySQL */
class MySQLUserRepository implements UserRepository {
	private static ?mysqli $db = null;

	function __construct() {
		if (self::$db === null) {
			self::$db = new mysqli(
				Env::get('MYSQL_HOST'),
				Env::get('MYSQL_USER'),
				Env::get('MYSQL_PASSWORD'),
				Env::get('MYSQL_DBNAME'),
				(int) Env::get('MYSQL_PORT')
			);

			self::$db->set_charset((string) Env::get('MYSQL_CHARSET'));
		}
	}

	function save(User $user): bool {
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
			self::$db?->query($sql);
			return true;
		} catch (mysqli_sql_exception) {
			return false;
		}
	}

	function getAll(): array {
		$result = self::$db?->query('SELECT * FROM usuarios');

		assert($result instanceof mysqli_result);
		$users = $result->fetch_all(MYSQLI_ASSOC);
		return array_map([$this, 'mapper'], $users);
	}

	function getByIDCard(int $idCard): ?User {
		return $this->getByCriteria("SELECT * FROM usuarios WHERE cedula=$idCard");
	}

	function getByID(UUID $id): ?User {
		return $this->getByCriteria("SELECT * FROM usuarios WHERE id='$id'");
	}

	private function getByCriteria(string $sql): ?User {
		$result = self::$db?->query($sql);
		assert($result instanceof mysqli_result);
		$info = $result->fetch_assoc();

		if ($info === [] || $info === null) {
			return null;
		}

		return $this->mapper($info);
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): User {
		return User::fromRepository($info);
	}
}
