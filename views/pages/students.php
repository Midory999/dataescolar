<?php

use App\Models\Student;

/** @var Student[] $students */
/** @var string $root */
/** @var null|string $message */

if ($message) echo <<<HTML
<script>
	Swal.fire({
		title: '$message',
		icon: 'success',
		toast: true,
		position: 'bottom-right',
		timer: 3000,
		timerProgressBar: true,
		showConfirmButton: false
	})
</script>
HTML;
?>

<section class="w3-section">
	<h2>Estudiante</h2>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/estudiantes/registrar">Añadir estudiante</a>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/inscripciones/registrar">Inscribir estudiante</a>
	<button class="w3-button w3-pale-red w3-round-medium" onclick="new PDF().fromElementID('student-list')">Imprimir</button>
	<div id="student-list" class="w3-responsive w3-section">
		<table class="w3-table-all">
			<thead>
				<tr>
					<th>Cédula</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Nacimiento</th>
					<th>Edad</th>
					<th>Tipo de Parto</th>
					<th>Compromiso</th>
					<th>Medicamentos</th>
					<th>Tipo de Sangre</th>
					<th>Género</th>
					<th>Dirección</th>
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
						<td>{$student->birthDate} - {$student->birthPlace}</td>
						<td>{$student->age}</td>
						<td>{$student->getBirthType()}</td>
						<td>{$student->getCompromises()}</td>
						<td>{$student->medicines}</td>
						<td>{$student->bloodType}</td>
						<td>{$student->getGender()}</td>
						<td>{$student->direction}</td>
						<td>{$student->getVaccines()}</td>
						<td>{$student->getSocialPrograms()}</td>
						<td>{$student->admission}</td>
						<td>{$student->getStatus()}</td>
						<td>{$student->description}</td>
					</tr>
				HTML ?>
			</tbody>
		</table>
	</div>
</section>
