<?php

namespace App\Repositories\LeafDB;

use App\Models\Area;
use App\Repositories\AreaRepository;

class LeafDBAreaRepository extends LeafDBConnection implements AreaRepository {
	function getAll(): array {
		$areas = self::$db->select('Areas')->all();

		return array_map([$this, 'mapper'], $areas);
	}

	private function mapper(array $info): Area {
		$area = new Area;
		$area->code = $info['codigo'];
		$area->name = $info['nombre'];

		return $area;
	}
}
