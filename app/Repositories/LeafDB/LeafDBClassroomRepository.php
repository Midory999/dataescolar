<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Classroom;
use App\Repositories\TeacherRepository;
use App\Repositories\ClassroomRepository;
use PDOException;

class LeafDBClassroomRepository
extends LeafDBConnection
implements ClassroomRepository {
	function __construct(private readonly TeacherRepository $teacherRepository) {
		parent::__construct();
	}

	function getAll(): array {
		$classrooms = self::db()->select('aulas')->all();

		return array_map([$this, 'mapper'], $classrooms);
	}

	function getByID(int $id): ?Classroom {
		assert(self::$db !== null);

		$classroomInfo = self::$db->select('aulas')->where('id', $id)->assoc();

		if ($classroomInfo === false) {
			return null;
		}

		return $this->mapper($classroomInfo);
	}

	function save(Classroom $classroom): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('Aulas')
				->params([
					'nombre'        => $classroom->name,
					'id_Profesor' => $classroom->teacher->getID(),
				])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): Classroom {
		$classroom = new Classroom(
			$info['nombre'],
			$this->teacherRepository->getByID($info['id_Profesor'])
		);

		$classroom->setID($info['id']);

		return $classroom;
	}
}
