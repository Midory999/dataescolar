<?php

namespace App\Models;

class Lapse {
	public int $id;
	/** @var string Fecha en la que inicio el lapso*/
	public string $start;
	/** @var string Fecha en la que finalizó el lapso*/
	public string $end;
	public string $name;
	public Period $period;
}
