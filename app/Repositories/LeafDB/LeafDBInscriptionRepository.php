<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Inscription;
use App\Repositories\StudentRepository;
use App\Repositories\PeriodRepository;
use App\Repositories\LevelRepository;
use App\Repositories\InscriptionRepository;
use PDOException;

class LeafDBInscriptionRepository
extends LeafDBConnection
implements InscriptionRepository {
	function __construct(
		private readonly StudentRepository $studentRepository,
		private readonly PeriodRepository $periodRepository,
		private readonly LevelRepository $levelRepository,
	) {
		parent::__construct();
	}

	function getAll(): array {
		assert(self::$db !== null);

		$inscription = self::$db->select('inscripciones')->all();
		return array_map([$this, 'mapper'], $inscription);
	}

	function getByID(int $id): ?Inscription {
		assert(self::$db !== null);

		$inscriptiontInfo = self::$db->select('inscripciones')->where('id', $id)->assoc();

		if ($inscriptiontInfo === false) {
			return null;
		}

		return $this->mapper($inscriptiontInfo);
	}

	function save(Inscription $inscription): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('Inscripciones')
				->params([
					'id_Estudiante'    => $inscription->student->id,
					'id_Periodo'       => $inscription->period->id,
					'id_Nivele'        => $inscription->level->code,
				])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): Inscription {
		$inscriptiont = new Inscription;
		$inscriptiont->id             = $info['id'];

		$student = $this->studentRepository->getByIDCard($info['id_Estudiante']);

		$period = $this->periodRepository->getByID($info['id_Periodo']);

		$level = $this->levelRepository->getByID($info['id_Nievele']);


		assert($student !== null);
		$inscriptiont->student = $student;

		assert($period !== null);
		$inscriptiont->period = $period;

		assert($level !== null);
		$inscriptiont->level = $level;

		return $inscriptiont;
	}
}
