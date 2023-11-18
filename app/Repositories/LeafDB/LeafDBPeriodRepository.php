<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Exceptions\DuplicatedRecordException;
use App\Models\Period;
use PDOException;
use App\Repositories\PeriodRepository;

class LeafDBPeriodRepository extends LeafDBConnection implements PeriodRepository {
	function save(Period $period): Period {
		try {
			self::db()
				->insert(self::TABLE)
				->params(['inicio' => $period->startYear])
				->execute();

			$period->setID(self::db()->lastInsertId());
			return $period;
		} catch (PDOException $error) {
			Logger::log($error);
			throw new DuplicatedRecordException("El período $period->startYear ya existe");
		}
	}

	function getByID(int $id): ?Period {
		$info = self::db()->select(self::TABLE)->where(self::PRIMARY_KEY, $id)->assoc();

		if (!$info) {
			return null;
		}

		return $this->mapper($info);
	}

	function getAll(): array {
		$periods = self::db()->select(self::TABLE)->orderBy('inicio')->all();

		return array_map([$this, 'mapper'], $periods);
	}

	function getAllAsArrays(): array {
		$periods = self::db()->select(self::TABLE)->orderBy('inicio')->all();

		return array_map(function (array $info): array {
			return $this->mapper($info)->toArray();
		}, $periods);
	}

	function getLatest(): ?Period {
		$info = self::db()->select(self::TABLE)->last();

		if (!$info) {
			return null;
		}

		return $this->mapper($info);
	}

	function ensureThereIsOnePeriod(): static {
		if (!$this->getLatest()) {
			$this->save(new Period(date('Y')));
		}

		return $this;
	}

	function mapper(array $info): Period {
		$period = new Period($info['inicio']);
		$period->setID($info[self::PRIMARY_KEY]);

		return $period;
	}
}
