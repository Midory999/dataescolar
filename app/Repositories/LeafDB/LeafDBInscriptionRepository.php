<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Inscription;
use App\Repositories\InscriptionRepository;
use App\Repositories\StudentRepository;
use App\Repositories\LevelRepository;
use App\Repositories\PeriodRepository;
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

		$inscriptions = self::$db->select('inscripciones')->all();
		return array_map([$this, 'mapper'], $inscriptions);
	}

	function getByIDCard(int $idCard): ?Inscription {
		assert(self::$db !== null);

		$inscriptionInfo = self::$db->select('inscripciones')->assoc();

		if ($inscriptionInfo === false) {
			return null;
		}

		return $this->mapper($inscriptionInfo);
	}

	function save(Inscription $inscription): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('Estudiantes')
				->params([
					'nombres'             => $inscription->name,

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
		$inscription = new Inscription;
		$inscription->id             = $info['id'];
		$inscription->name          = $info['nombre'];

		$student = $this->studentRepository->getByID($info['id_Estudiante']);
		$period = $this->periodRepository->getByID($info['id_Period']);
		$level = $this->levelRepository->getByID($info['id_Level']);
		(
			$info['id_Estudiante'];
			$info['id_Period'];
			$info['id_Level'];
		);

		assert($representative !== null);
		$inscription->student = $student;
		$inscription->period = $period;
		$inscription->level = $level;

		return $inscription;
	}
}
