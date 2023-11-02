<?php

namespace App\Models;

class Classroom extends Person{
	public string $nombre;
	public object $profesor;
	public object $estudiante;
}