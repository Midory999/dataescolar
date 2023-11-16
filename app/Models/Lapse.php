<?php

namespace App\Models;

class Lapse {
	public string $start;
	/** @var string Fecha en la que inicio el lapso*/
	public string $end;
	/** @var string Fecha en la que finalzo el lapso*/
	public string $name;
	public Period $period;
}
