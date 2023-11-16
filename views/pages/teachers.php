<?php
/** @var App\Models\Teacher[] $teachers */
/** @var string $root */
?>

<section class="wrapper">
	<table class="table">
		<caption class="table__caption">
			<h2 class="table__title">Todos los profesores</h2>
			<a href="<?= $root ?>/profesores/registrar">Registrar</a>
		</caption>
		<thead>
			<tr>
				<th>Cédula</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Estatus</th>
				<th>Especialidad</th>
				<th>Dirección</th>
				<th>Correo</th>
				<th>telefono</th>
				<th>Ingreso</th>
				<th>Fecha de Nacimiento</th>
				<th>Edad</th>
				<th>Género</th>
				<th>Vacunas</th>
				<th>Carga Horaria</th>
				<th>Código de Independencia</th>
				<th>Área</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($teachers as $teacher) echo <<<HTML
			<tr>
				<td>{$teacher->names}</td>
				<td>{$teacher->lastnames}</td>
				<td>{$teacher->idCard}</td>
				<td>{$teacher->status}</td>
				<td>{$teacher->specialty}</td>
				<td>{$teacher->direction}</td>
				<td>{$teacher->email}</td>
				<td>{$teacher->phone}</td>
				<td>{$teacher->income}</td>
				<td>{$teacher->birthDate}</td>
				<td>{$teacher->age}</td>
				<td>{$teacher->gender}</td>
				<td>{$teacher->vaccines}</td>
				<td>{$teacher->socialPrograms}</td>
				<td></td>
				<td>{$teacher->area->name}</td>
				</tr>
			HTML ?>
		</tbody>
	</table>
</section>
