<?php

namespace App\Models;

class Student extends Person{
	public string $fechaNacimiento;
	public string $lugarNacimiento;
	public int $edad;
	public string $compromisos;
	public string $medicamentos;
	public string $medidas;
	public string $vacunas;
	public string $programasSociales;
	/** @var string Fecha en la que ingresó por primera vez */
	public string $ingreso;
	public bool $estatus;
	public string $descripcion;
	public object $representante;
}