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

		$areaInfo = self::$db->select('Areas')->where(
			$criteria,
			$value
		)->assoc();

		if ($areaInfo === false) {
			return null;
		}

		return $this->mapper($areaInfo);
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
		return $this->getByCriteria('codigo', $idCard);
	}

	function save(Area $area): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('Areas')
				->params([
					'nombres'      => $area->name,
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
		$area->id        = $info['id'];
		$area->name      = $info['nombres'];

		return $area;
	}
}
