<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Area;
use App\Models\Teacher;
use App\Repositories\AreaRepository;
use PDOException;
use App\Repositories\TeacherRepository;

class LeafDBTeacherRepository
extends LeafDBConnection
implements TeacherRepository {
	function __construct(private readonly AreaRepository $areaRepository) {
	}

	function setTeacherTo(Area $area): void {
		$teacher = $this->searchByCriteria(self::AREA_FOREIGN_KEY, $area->getCode());

		if ($teacher) {
			$area->setTeacher($teacher);
		}
	}

	private function searchByCriteria(string $criteria, float|string $value): ?Teacher {
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
		return $this->searchByCriteria('id', $id);
	}

	function getByIDCard(int $idCard): ?Teacher {
		return $this->searchByCriteria('cedula', $idCard);
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
					'codigo_Area' => $teacher->area->getCode()
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
