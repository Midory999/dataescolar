<?php

namespace App\Models;

class Period extends Model {

	private const MAX_LAPSES_COUNT = 3;

	private ?int $id = null;
	/** @var Lapse[] */
	private array $lapses = [];

	function __construct(public readonly int $startYear) {
	}

	function getLapse(int $number): ?Lapse {
		return @$this->lapses[--$number];
	}

	function getEndYear(): int {
		return $this->startYear + 1;
	}

	function getID(): ?int {
		return $this->id;
	}

	function setID(int $id): void {
		$this->id = $id;
	}

	function addLapse(Lapse $lapse): void {
		if (count($this->lapses) < self::MAX_LAPSES_COUNT) {
			$this->lapses[] = $lapse;
		}
	}

	function toArray(): array {
		return [
			'id' => $this->getID(),
			'inicio' => $this->startYear,
			'fin' => $this->getEndYear(),
			'lapsos' => array_map(fn (Lapse $lapse) => $lapse->toArray(), $this->lapses)
		];
	}

	function __toString(): string {
		return "{$this->startYear}-{$this->getEndYear()}";
	}
}
