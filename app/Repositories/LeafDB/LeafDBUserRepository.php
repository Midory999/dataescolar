<?php

namespace App\Repositories\LeafDB;

use App\Core\Env;
use App\Core\UUID;
use App\Models\User;
use App\Repositories\UserRepository;
use Leaf\Db;
use PDOException;

class LeafDBUserRepository implements UserRepository {
  private static ?Db $db = null;

  function __construct() {
    if (self::$db === null) {
      self::$db = new Db([
        'dbtype' => Env::get('DB_CONNECTION'),
        'dbname' => __DIR__ . '/../SQLite/' . Env::get('DB_DATABASE')
      ]);
    }
  }

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

      return self::$db->lastInsertId() === $user->id;
    } catch (PDOException) {
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

    if ($userInfo === []) {
      return null;
    }

    return $this->mapper($userInfo);
  }

  /** @param array<string, string> $info */
  private function mapper(array $info): User {
    return User::fromRepository($info);
  }
}