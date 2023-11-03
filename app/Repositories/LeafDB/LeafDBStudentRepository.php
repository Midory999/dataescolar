<?php

namespace App\Repositories\LeafDB;

use App\Models\Student;
use App\Repositories\RepresentativeRepository;
use App\Repositories\StudentRepository;

class LeafDBStudentRepository
extends LeafDBConnection
implements StudentRepository {
	function __construct(
		private readonly RepresentativeRepository $representativeRepository
	) {}

	function getAll(): array {
		assert(self::$db !== null);

		$students = self::$db->select('estudiantes')->all();
		return array_map([$this, 'mapper'], $students);
	}

	function getByIDCard(int $idCard): ?Student {
		assert(self::$db !== null);

		$studentInfo = self::$db->select('estudiantes')->where('cedula', $idCard)->assoc();

		if ($studentInfo === false) {
			return null;
		}

		return $this->mapper($studentInfo);
	}

	function save(Student $student): bool {
		// TODO: registrar estudiante
		return false;
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): Student {
		$student = new Student;
		$student->id = $info['id'];
		$student->names = $info['nombres'];
		$student->lastnames = $info['apellidos'];
		$student->idCard = $info['cedula'];
		$student->birthDate = $info['fecha_nacimiento'];
		$student->birthPlace = $info['lugar_nacimiento'];
		$student->age = $info['edad'];
		$student->gender = $info['genero'];
		$student->birthType = $info['tipo_parto'];
		$student->compromises = $info['compromisos'];
		$student->medicines = $info['medicamentos'];
		$student->bloodType = $info['tipo_sangre'];
		$student->direction = $info['direccion'];
		$student->measurements = $info['medidas'];
		$student->vaccines = $info['vacunas'];
		$student->socialPrograms = $info['programas_sociales'];
		$student->admission = $info['ingreso'];
		$student->status = $info['estatus'];
		$student->description = $info['descripcion'];

		$representative = $this->representativeRepository->getByID(
			$info['id_Representante']
		);

		assert($representative !== null);
		$student->representative = $representative;

		return $student;
	}
}
