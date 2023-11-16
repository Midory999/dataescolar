<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Lapse;
use App\Repositories\PeriodRepository;
use App\Repositories\LapseRepository;
use PDOException;

class LeafDBLapseRepository
extends LeafDBConnection
implements LapseRepository {
	function __construct(private readonly PeriodRepository $periodRepository) {
		parent::__construct();
	}

	function getAll(): array {
		assert(self::$db !== null);

		$lapses = self::$db->select('lapsos')->all();
		return array_map([$this, 'mapper'], $lapses);
	}

	function getByID(int $id): ?Lapse {
		assert(self::$db !== null);

		$lapseInfo = self::$db->select('lapsos')->where('id', $id)->assoc();

		if ($lapseInfo === false) {
			return null;
		}

		return $this->mapper($lapseInfo);
	}

	function save(Lapse $lapse): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('Lapsos')
				->params([
					'inicio' => $lapse->start,
					'fin'    => $lapse->end,
					'nombre' => $lapse->name,
					'id_periodo' => $lapse->period->getID(),
				])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): Lapse {
		$lapse = new Lapse;
		$lapse->start  = $info['inicio'];
		$lapse->end    = $info['fin'];
		$lapse->name   = $info['nombre'];

		$period = $this->periodRepository->getByID($info['id_Periodo']);
		assert($period !== null);
		$lapse->period = $period;

		return $lapse;
	}
}
