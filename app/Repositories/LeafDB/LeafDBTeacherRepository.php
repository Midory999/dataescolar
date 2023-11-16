<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Teacher;
use App\Repositories\TeacherRepository;
use PDOException;

class LeafDBTeacherRepository
extends LeafDBConnection
implements TeacherRepository {

	/* function __construct(
		private readonly TeacherRepository $teacherRepository
	) {
		parent::__construct();
	}
 */
	private function getByCriteria(
		string $criteria,
		float|string $value
	): ?Teacher {
		assert(self::$db !== null);

		$teachereInfo = self::$db->select('Profesores')->where(
			$criteria,
			$value
		)->assoc();

		if ($teachereInfo === false) {
			return null;
		}

		return $this->mapper($teachereInfo);
	}


	function getAll(): array {
		assert(self::$db !== null);

		$teachers = self::$db->select('profesores')->all();
		return array_map([$this, 'mapper'], $teachers);
	}

	function getByID(int $id): ?Teacher {
		return $this->getByCriteria('id', $id);
	}


	function getByIDCard(int $idCard): ?Teacher {
		assert(self::$db !== null);

		$teacherInfo = self::$db->select('profesores')->where('profesores', $idCard)->assoc();

		if ($teacherInfo === false) {
			return null;
		}

		return $this->mapper($teacherInfo);
	}

	function save(Teacher $teacher): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('Profesores')
				->params([
					'nombres'             => $teacher->names,
					'apellidos'           => $teacher->lastnames,
					'cedula'              => $teacher->idCard,
					'estatus'             => $teacher->status,
					'especialidad'        => $teacher->specialty,
					'direccion'           => $teacher->direction,
					'correo'              => $teacher->email,
					'telefono'            => $teacher->phone,
					'ingreso'             => $teacher->income,
					'fecha_nacimiento'    => $teacher->birthDate,
					'edad'                => $teacher->age,
					'genero'              => $teacher->gender,
					'vacunas'             => $teacher->vaccines,
					'carga_horaria'       => $teacher->socialPrograms,
				])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): Teacher {
		$teacher = new Teacher;
		$teacher->id             = $info['id'];
		$teacher->names          = $info['nombres'];
		$teacher->lastnames      = $info['apellidos'];
		$teacher->idCard         = $info['cedula'];
		$teacher->status         = $info['estatus'];
		$teacher->specialty      = $info['especialidad'];
		$teacher->direction      = $info['direccion'];
		$teacher->email          = $info['correo'];
		$teacher->phone          = $info['telefono'];
		$teacher->income         = $info['ingreso'];
		$teacher->birthDate      = $info['fecha_nacimiento'];
		$teacher->age            = $info['edad'];
		$teacher->gender         = $info['genero'];
		$teacher->vaccines       = $info['vacunas'];
		$teacher->socialPrograms = $info['carga_horaria'];

		/* $teacher = $this->teacherRepository->getByID(
			$info['id_Student']
		);
 */
		return $teacher;
	}
}
