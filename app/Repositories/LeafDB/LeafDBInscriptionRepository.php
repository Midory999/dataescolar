<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Inscription;
use App\Models\Student;
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
		try {
			self::db()
				->insert(self::TABLE)
				->params([
					self::STUDENT_FOREIGN_KEY => $inscription->student->id,
					self::PERIOD_FOREIGN_KEY  => $inscription->period->getID(),
					self::LEVEL_FOREIGN_KEY   => $inscription->level->code,
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
		$student = $this->studentRepository->getByID($info[self::STUDENT_FOREIGN_KEY]);
		$period = $this->periodRepository->getByID($info[self::PERIOD_FOREIGN_KEY]);
		$level = $this->levelRepository->getByID($info[self::LEVEL_FOREIGN_KEY]);
		$inscriptiont = new Inscription($info[self::PRIMARY_KEY], $student, $period, $level);

		return $inscriptiont;
	}
}
