<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Area;
use App\Repositories\AreaRepository as Repository;
use App\Repositories\LeafDB\LeafDBConnection as Connection;
use PDOException;

class LeafDBAreaRepository extends Connection implements Repository {
	private function getByCriteria(string $criteria, float|string $value): ?Area {
		$areaInfo = self::db()->select('Areas')->where($criteria, $value)->assoc();

		if ($areaInfo === false) {
			return null;
		}

		return $this->mapper($areaInfo);
	}

	function getAll(): array {
		$areas = self::db()->select('areas')->all();
		return array_map([$this, 'mapper'], $areas);
	}

	function getByCode(int $code): ?Area {
		return $this->getByCriteria('codigo', $code);
	}

	function save(Area $area): bool {
		try {
			self::db()
				->insert('Areas')
				->params(['nombre' => $area->name, 'codigo' => $area->code])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): Area {
		$area = Area::create($info['codigo'], $info['nombre']);
		return $area;
	}
}
