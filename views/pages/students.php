<?php

use App\Models\Student;

/** @var Student[] $students */
/** @var string $root */
?>

<h2>Estudiante</h2>
<a href="<?= $root ?>/estudiantes/registrar">
	<button>Añadir</button>
</a>
<table>
	<thead>
		<tr>
			<th>Cédula</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Fecha de Nacimiento</th>
			<th>Lugar de Nacimiento</th>
			<th>Edad</th>
			<th>Tipo de Parto</th>
			<th>Compromiso</th>
			<th>Medicamentos</th>
			<th>Tipo de Sangre</th>
			<th>Género</th>
			<th>Dirección</th>
			<th>Medidas</th>
			<th>Vacunas</th>
			<th>Programas Sociales</th>
			<th>Ingreso</th>
			<th>Estatus</th>
			<th>Descripción</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($students as $student) echo <<<HTML
		<tr>
			<td>{$student->idCard}</td>
		</tr>
		HTML ?>
	</tbody>
</table>
