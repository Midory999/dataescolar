<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Exceptions\DuplicatedRecordException;
use App\Models\Area;
use App\Repositories\AreaRepository;
use App\Repositories\ClassroomRepository;
use App\Repositories\TeacherRepository;
use PDOException;

class LeafDBAreaRepository extends LeafDBConnection implements AreaRepository {
	private ?TeacherRepository $teacherRepository = null;
	private ?ClassroomRepository $classroomRepository = null;

	function setTeacherRepository(TeacherRepository $teacherRepository): static {
		$this->teacherRepository = $teacherRepository;

		return $this;
	}

	function setClassroomRepository(ClassroomRepository $classroomRepository): static {
		$this->classroomRepository = $classroomRepository;

		return $this;
	}

	function getAll(): array {
		$areas = self::db()->select(self::TABLE)->all();
		return array_map([$this, 'mapper'], $areas);
	}

	function getAllAsArray(): array {
		$areas = self::db()->select(self::TABLE)->all();

		return array_map(function (array $info): array {
			return $this->mapper($info)->toArray();
		}, $areas);
	}

	function getByCode(int $code): ?Area {
		return $this->searchByCriteria(self::PRIMARY_KEY, $code);
	}

	function getBySlug(string $slug): ?Area {
		return $this->searchByCriteria('nombre', Area::parseSlug($slug));
	}

	function getRecent(): ?Area {
		$info = $this->db()->select(self::TABLE)->orderBy(self::PRIMARY_KEY)->assoc();

		return $info ? $this->mapper($info) : null;
	}

	function save(Area $area): Area {
		if ($area->hasCode()) {
			self::db()
				->update(self::TABLE)
				->params(['nombre' => $area->name])
				->where('codigo', $area->getCode())
				->execute();

			return $area;
		}

		try {
			$this->ensureAreaDoesNotExists($area); // README: Reemplazar esto con una restricción UNIQUE en el init.sql > Areas:nombre
			self::db()
				->insert(self::TABLE)
				->params(['nombre' => $area->name])
				->execute();

			$area->setCode(self::db()->lastInsertId());

			return $area;
		} catch (PDOException $error) {
			Logger::log($error);
			throw new DuplicatedRecordException("EL area $area->name ya existe");
		}
	}

	/** @param array<string, string> $info */
	function mapper(array $info): Area {
		$area = new Area($info['nombre']);
		$area->setCode($info['codigo']);
		$this->teacherRepository?->setTeacherTo($area);

		return $area;
	}

	private function searchByCriteria(string $criteria, int|string|bool $value): ?Area {
		$info = self::db()->select(self::TABLE)->where($criteria, $value)->assoc();

		if ($info === false) {
			return null;
		}

		return $this->mapper($info);
	}

	/** @throws DuplicatedRecordException */
	private function ensureAreaDoesNotExists(Area $area): void {
		if ($this->searchByCriteria('nombre', $area->name)) {
			throw new DuplicatedRecordException("El area $area->name ya existe");
		}
	}
}
