<?php

namespace App\Models;

class Representative extends Person{
	public string $correoElectronico;
	public string $numeroTelefono;
	public string $estudioSocioEconomico;
	public object $ocupacion;
	public object $lugarTrabajo;
}