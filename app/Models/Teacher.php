<?php

namespace App\Models;

class Teacher extends Person{
	public string $estatus;
	public string $especialidad;
	public string $correoElectronico;
	public string $numeroTelefono;
	public string $fechaIngreso;
	public string $fechaNacimiento;
	public string $edad;
	public string $vacunas;
	public string $cargaHoraria;
	public string $codigoIdependencia;
	public object $Area;
}