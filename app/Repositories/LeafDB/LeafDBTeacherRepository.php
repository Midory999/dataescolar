<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Teacher;
use App\Repositories\AreaRepository;
use App\Repositories\TeacherRepository as TRepository;
use PDOException;
use App\Repositories\LeafDB\LeafDBConnection as Connection;

class LeafDBTeacherRepository extends Connection implements TRepository {
	function __construct(private readonly AreaRepository $areaRepository) {}

	private function getByCriteria(string $criteria, float|string $value): ?Teacher {
		assert(self::$db !== null);

		$teachereInfo = self::$db->select('Profesores')->where($criteria, $value)->assoc();

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
		return $this->getByCriteria('cedula', $idCard);
	}

	function save(Teacher $teacher): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('Profesores')
				->params([
					'nombres'      => $teacher->names,
					'apellidos'    => $teacher->lastnames,
					'cedula'       => $teacher->idCard,
					'estatus'      => $teacher->status,
					'especialidad' => $teacher->specialty,
					'direccion'    => $teacher->direction,
					'correo'       => $teacher->email,
					'telefono'     => $teacher->phone,
					'fecha_ingreso'    => $teacher->income,
					'fecha_nacimiento' => $teacher->birthDate,
					'edad'    => $teacher->age,
					'genero'  => $teacher->gender,
					'vacunas' => $teacher->vaccines,
					'carga_horaria'    => $teacher->socialPrograms,
					'codigo_idependencia' => '', // WARNING: Añadir un campo para el código de independencia
					'codigo_Area' => $teacher->area->code
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
		$teacher->id        = $info['id'];
		$teacher->names     = $info['nombres'];
		$teacher->lastnames = $info['apellidos'];
		$teacher->idCard    = $info['cedula'];
		$teacher->status    = $info['estatus'];
		$teacher->specialty = $info['especialidad'];
		$teacher->direction = $info['direccion'];
		$teacher->email     = $info['correo'];
		$teacher->phone     = $info['telefono'];
		$teacher->income    = $info['fecha_ingreso'];
		$teacher->birthDate = $info['fecha_nacimiento'];
		$teacher->age       = $info['edad'];
		$teacher->gender    = $info['genero'];
		$teacher->vaccines  = $info['vacunas'];
		$teacher->socialPrograms = $info['carga_horaria'];
		$teacher->area = $this->areaRepository->getByCode($info['codigo_Area']);

		return $teacher;
	}
}
