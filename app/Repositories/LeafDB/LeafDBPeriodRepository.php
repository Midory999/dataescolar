<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Period;
use App\Repositories\PeriodRepository as Repository;
use PDOException;

class LeafDBPeriodRepository extends LeafDBConnection implements Repository {
	function save(Period $period): bool {
		assert(parent::$db !== null);

		try {
			self::$db
				->insert('periodos')
				->params([
					'inicio' => $period->getStartYear(),
					'fin' => $period->getEndYear()
				])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	function getByID(int $id): ?Period {
		assert(self::$db !== null);

		$periodInfo = self::$db->select('periodos')->where('id', $id)->assoc();

		if ($periodInfo === null) {
			return null;
		}

		return $this->mapper($periodInfo);
	}

	function getAll(): array {
		assert(self::$db !== null);

		$periods = self::$db->select('periodos')->all();
		return array_map([$this, 'mapper'], $periods);
	}

	function getLatest(): ?Period {
		assert(self::$db !== null);

		$periodInfo = self::$db->select('periodos')->last();

		if ($periodInfo === false) {
			return null;
		}

		return $this->mapper($periodInfo);
	}

	private function mapper(array $periodInfo): Period {
		return new Period($periodInfo['id'], $periodInfo['inicio']);
	}
}
