<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Area;
use App\Repositories\AreaRepository;
use PDOException;

class LeafDBAreaRepository
extends LeafDBConnection
implements AreaRepository {


	private function getByCriteria(
		string $criteria,
		float|string $value
	): ?Area {
		assert(self::$db !== null);

		$areareInfo = self::$db->select('Areas')->where(
			$criteria,
			$value
		)->assoc();

		if ($areareInfo === false) {
			return null;
		}

		return $this->mapper($areareInfo);
	}


	function getAll(): array {
		assert(self::$db !== null);

		$areas = self::$db->select('areas')->all();
		return array_map([$this, 'mapper'], $areas);
	}

	function getByID(int $id): ?Area {
		return $this->getByCriteria('id', $id);
	}


	function getByIDCard(int $idCard): ?Area {
		assert(self::$db !== null);

		$areaInfo = self::$db->select('areas')->where('areas', $idCard)->assoc();

		if ($areaInfo === false) {
			return null;
		}

		return $this->mapper($areaInfo);
	}

	function save(Area $area): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('Areas')
				->params([
					'nombre'             => $area->names,
				])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): Area {
		$area = new Area;
		$area->names          = $info['nombres'];

		return $area;
	}
}
