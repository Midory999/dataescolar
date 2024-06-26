<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Level;
use App\Repositories\LevelRepository;
use PDOException;

class LeafDBLevelRepository
extends LeafDBConnection
implements LevelRepository {
	function getAll(): array {
		$levels = self::db()->select('niveles')->all();
		return array_map([$this, 'mapper'], $levels);
	}

	function getByCode(string $code): ?Level {
		return $this->getByCriteria('codigo', $code);
	}

	function getByID(int $id): ?Level {
		return $this->getByCriteria('id', $id);
	}

	function save(Level $level): bool {
		if ($level->hasId()) {
			self::db()
				->update('Niveles')
				->params(['codigo' => $level->code])
				->where('id', $level->id)
				->execute();

			return true;
		}

		try {
			self::db()
				->insert('Niveles')
				->params([
					'codigo'   => $level->code,

				])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	private function getByCriteria(
		string $criteria,
		float|string $value
	): ?Level {
		$levelInfo = self::db()->select('Niveles')->where(
			$criteria,
			$value
		)->assoc();

		if ($levelInfo === false) {
			return null;
		}

		return $this->mapper($levelInfo);
	}

	private function mapper(array $levelInfo): Level {
		$level            = new Level;
		$level->id        = $levelInfo['id'];
		$level->code      = $levelInfo['codigo'];

		return $level;
	}
}
