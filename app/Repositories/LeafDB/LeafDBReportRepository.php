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

final class LeafDBReportRepository
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
		$reports = self::db()->select(self::TABLE)->all();

		return array_map([$this, 'mapper'], $reports);
	}

	function getByID($id): ?Report {
		$info = self::db()->select(self::TABLE)->where(self::PRIMARY_KEY, $id)->assoc();

		if ($info === false) {
			return null;
		}

		return $this->mapper($info);
	}

	function save(Report $report): void {
		try {
			$stmt = self::db()
				->insert(self::TABLE)
				->params([
					self::STUDENT_FOREIGN_KEY => $report->student->id,
					self::TEACHER_FOREIGN_KEY => $report->teacher->id,
					self::AREA_FOREIGN_KEY => $report->area->getCode(),
					self::LEVEL_FOREIGN_KEY => $report->level->id,
					'diagnostico' => $report->diagnostic,
					'lapso1' => $report->lapse1,
					'lapso2' => $report->lapse2,
					'lapso3' => $report->lapse3,
					'informes_final' => $report->finalInform
				]);

			$stmt->execute();
		} catch (PDOException $error) {
			Logger::log($error);
		}
	}

	/** @param array<string, string> $info */
	private function mapper(array $info): Report {
		$student = $this->studentRepository->getByID($info[self::STUDENT_FOREIGN_KEY]);
		$teacher = $this->teacherRepository->getByID($info[self::TEACHER_FOREIGN_KEY]);
		$area = $this->areaRepository->getByCode($info[self::AREA_FOREIGN_KEY]);
		$level = $this->levelRepository->getByID($info[self::LEVEL_FOREIGN_KEY]);

		$report = new Report(
			$info[self::PRIMARY_KEY],
			$student,
			$teacher,
			$area,
			$level,
			$info['diagnostico'],
			$info['lapso1'],
			$info['lapso2'],
			$info['lapso3'],
			$info['informes_final']
		);

		return $report;
	}
}
