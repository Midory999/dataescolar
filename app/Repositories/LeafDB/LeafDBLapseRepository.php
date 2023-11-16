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

	function __construct(
		private readonly PeriodRepository $periodRepository
	) {
		parent::__construct();
	}

	function getAll(): array {
		assert(self::$db !== null);

		$lapses = self::$db->select('lapsos')->all();
		return array_map([$this, 'mapper'], $lapses);
	}

	function getByIDCard(int $idCard): ?Lapse {
		assert(self::$db !== null);

		$lapseInfo = self::$db->select('lapsos')->where('cedula', $idCard)->assoc();

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
					'inicio'             => $lapse->start,
					'fin'                => $lapse->end,
					'nombre'             => $lapse->name,
					'periodo'            => $lapse->period,
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
		$lapse->period = $info['periodo'];

		$period = $this->periodRepository->getByID(
			$info['id_Period']
		);

		assert($period !== null);
		$lapse->period = $period;

		return $lapse;
	}
}
