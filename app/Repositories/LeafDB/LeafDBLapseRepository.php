<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Exceptions\DuplicatedRecordException;
use App\Models\Lapse;
use App\Repositories\PeriodRepository;
use App\Repositories\LapseRepository;
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
		$lapse = self::db()->select(self::TABLE)->where(self::PRIMARY_KEY, $id)->assoc();

		if ($lapse === false) {
			return null;
		}

		return $this->mapper($lapse);
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
}
