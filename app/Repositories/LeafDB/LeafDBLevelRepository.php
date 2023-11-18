<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Level;
use App\Repositories\LevelRepository as Repository;
use App\Repositories\LeafDB\LeafDBConnection as Connection;
use PDOException;

class LeafDBLevelRepository extends Connection implements Repository {
	private function getByCriteria(string $criteria, float|string $value): ?Level {
		assert(self::$db !== null);

		$levelInfo = self::$db->select('Niveles')->where($criteria, $value)->assoc();

		if ($levelInfo === false) {
			return null;
		}

		return $this->mapper($levelInfo);
	}

	function getAll(): array {
		assert(self::$db !== null);

		$levels = self::$db->select('niveles')->all();
		return array_map([$this, 'mapper'], $levels);
	}

	function getByCode(int $code): ?Level {
		return $this->getByCriteria('codigo', $code);
	}

	function save(Level $level): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('Niveles')
				->params(['nombre' => $level->name,'codigo' => $level->code])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): Level {
		$level = Level::create($info['codigo'], $info['nombre']);
		return $level;
	}
}
