<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Exceptions\DuplicatedRecordException;
use App\Models\Lapse;
use App\Models\Period;
use App\Repositories\LapseRepository;
use App\Repositories\PeriodRepository;
use PDOException;

class LeafDBLapseRepository extends LeafDBConnection implements LapseRepository {
	function __construct(private readonly PeriodRepository $periodRepository) {
		parent::__construct();
	}

	function getAll(): array {
		$lapses = self::db()->select(self::TABLE)->all();
		return array_map([$this, 'mapper'], $lapses);
	}

	function getByID(int $id): ?Lapse {
		return $this->searchByCriteria(self::PRIMARY_KEY, $id);
	}

	function setLapsesTo(Period $period): void {
		$lapses = self::db()
			->select(self::TABLE)
			->where(self::PERIOD_FOREIGN_KEY, $period->getID())
			->all();

		foreach ($lapses as $lapse) {
			$period->addLapse($this->mapper($lapse));
		}
	}

	function save(Lapse $lapse): Lapse {
		try {
			self::db()
				->insert(self::TABLE)
				->params([
					'nombre' => $lapse->name,
					'inicio' => $lapse->startDate,
					'fin'    => $lapse->endDate,
					'id_periodo' => $lapse->period->getID()
				])
				->execute();

			$lapse->setID(self::db()->lastInsertId());

			return $lapse;
		} catch (PDOException $error) {
			Logger::log($error);
			throw new DuplicatedRecordException("El $lapse->name del período {$lapse->period->startYear} ya existe");
		}
	}

	/** @param array<string, int|string> $info */
	function mapper(array $info): Lapse {
		$lapse = new Lapse(
			$info['nombre'],
			$info['inicio'],
			$info['fin'],
			$this->periodRepository->getByID($info['id_periodo'])
		);

		$lapse->setID($info[self::PRIMARY_KEY]);

		return $lapse;
	}

	private function searchByCriteria(string $criteria, int|string|bool $value): ?Lapse {
		$lapse = self::db()->select(self::TABLE)->where($criteria, $value)->assoc();

		if ($lapse === false) {
			return null;
		}

		return $this->mapper($lapse);
	}
}
