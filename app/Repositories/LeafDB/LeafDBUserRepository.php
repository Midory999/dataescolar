<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Core\UUID;
use App\Exceptions\DuplicatedIDCardException;
use App\Models\User;
use App\Repositories\UserRepository;
use PDOException;

class LeafDBUserRepository extends LeafDBConnection implements UserRepository {
	function save(User $user): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('usuarios')
				->params([
					'id'        => $user->id,
					'nombre'    => $user->name,
					'apellido'  => $user->lastname,
					'cedula'    => $user->idCard,
					'clave'     => $user->password,
					'rol'       => $user->role,
					'pregunta'  => $user->question,
					'respuesta' => $user->answer
				])
				->execute();

			return true;
		} catch (PDOException $error) {
			if (strpos($error->getMessage(), 'UNIQUE') !== -1) {
				// README: El error es por falla de un campo único (cédula)
				throw new DuplicatedIDCardException;
			}

			Logger::log($error);
			return false;
		}
	}

	function getAll(): array {
		assert(self::$db !== null);

		$users = self::$db->select('usuarios')->all();
		return array_map([$this, 'mapper'], $users);
	}

	function getByIDCard(int $idCard): ?User {
		return $this->getByCriteria('cedula', $idCard);
	}

	function getByID(UUID $id): ?User {
		return $this->getByCriteria('id', $id);
	}

	private function getByCriteria(string $criteria, string|float $value): ?User {
		assert(self::$db !== null);

		$userInfo = self::$db->select('usuarios')->where($criteria, $value)->assoc();

		if ($userInfo === false) {
			return null;
		}

		return $this->mapper($userInfo);
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): User {
		return User::fromRepository($info);
	}
}
