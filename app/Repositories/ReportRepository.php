<?php

namespace App\Repositories;

use App\Models\Report;

class ReportRepository {
	protected $reports = [];

	public function getAll(): array {
		return $this->reports;
	}

	public function getByID($id): ?Report {
		foreach ($this->reports as $report) {
			if ($report->id === $id) {
				return $report;
			}
		}
		return null;
	}

	public function save(Report $report): void {
		// Lógica para guardar el informe en la base de datos o en algún otro almacenamiento
		$this->reports[] = $report;
	}
}
