<?php

namespace App\Repositories\LeafDB;

use App\Core\Logger;
use App\Models\Report;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;
use App\Repositories\AreaRepository;
use App\Repositories\LevelRepository;
use App\Repositories\ReportRepository;
use PDOException;

class LeafDBReportRepository
extends LeafDBConnection
implements ReportRepository {
	function __construct(
		private readonly StudentRepository $studentRepository,
		private readonly TeacherRepository $teacherRepository,
		private readonly AreaRepository $areaRepository,
		private readonly LevelRepository $levelRepository,
	) {
		parent::__construct();
	}

	function getAll(): array {
		assert(self::$db !== null);

		$reports = self::$db->select('reports')->all();
		return array_map([$this, 'mapper'], $reports);
	}

	function getByID(int $id): ?Report {
		assert(self::$db !== null);

		$reportInfo = self::$db->select('reports')->where('id', $id)->assoc();

		if ($reportInfo === false) {
			return null;
		}

		return $this->mapper($reportInfo);
	}

	function save(Report $report): bool {
		assert(self::$db !== null);

		try {
			self::$db
				->insert('reports')
				->params([
					'id_Student' => $report->student->id,
					'id_Teacher' => $report->teacher->id,
					'id_Area' => $report->area->code,
					'id_Level' => $report->level->code,
				])
				->execute();

			return true;
		} catch (PDOException $error) {
			Logger::log($error);
			return false;
		}
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): Report {
		$report = new Report;
		$report->id = $info['id'];

		$student = $this->studentRepository->getByIDCard($info['id_Student']);

		$teacher = $this->teacherRepository->getByID($info['id_Teacher']);

		$area = $this->areaRepository->getByCode($info['id_Area']);

		$level = $this->levelRepository->getByID($info['id_Level']);

		assert($student !== null);
		$report->student = $student;

		assert($teacher !== null);
		$report->teacher = $teacher;

		assert($area !== null);
		$report->area = $area;

		assert($level !== null);
		$report->level = $level;

		return $report;
	}
}
