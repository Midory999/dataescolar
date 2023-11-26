<?php

use App\Models\Student;

/** @var Student[] $students */
/** @var string $root */
/** @var null|string $message */

?>

<section class="w3-section">
	<h2>Estudiante</h2>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/estudiantes/registrar">Añadir</a>
	<button class="w3-button w3-pale-red w3-round-medium" onclick="new PDF().fromElementID('student-list')">Imprimir</button>
	<div id="student-list" class="w3-responsive w3-section">
		<table class="w3-table-all">
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
					<th>Fecha de Ingreso</th>
					<th>Estatus</th>
					<th>Descripción</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($students as $student) echo <<<HTML
					<tr>
						<td>{$student->idCard}</td>
						<td>{$student->names}</td>
						<td>{$student->lastnames}</td>
						<td>{$student->birthDate}</td>
						<td>{$student->birthPlace}</td>
						<td>{$student->age}</td>
						<td>{$student->birthType}</td>
						<td>{$student->compromises}</td>
						<td>{$student->medicines}</td>
						<td>{$student->bloodType}</td>
						<td>{$student->gender}</td>
						<td>{$student->direction}</td>
						<td>{$student->measurements}</td>
						<td>{$student->vaccines}</td>
						<td>{$student->socialPrograms}</td>
						<td>{$student->admission}</td>
						<td>{$student->status}</td>
						<td>{$student->description}</td>
					</tr>
				HTML ?>
			</tbody>
		</table>
	</div>
</section>
