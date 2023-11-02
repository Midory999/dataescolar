<?php

namespace App\Models;

class Lapse extends Person{
	public string $nombre;
	/** @var string Fecha en la que inicio el lapso*/
	public string $inicio;
	/** @var string Fecha en la que finalzo el lapso*/
	public string $fin;
	public object $periodo;
}