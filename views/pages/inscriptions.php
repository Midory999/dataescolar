<?php

/** @var App\Models\Inscription[] $inscriptions */
/** @var string $root */
?>

<section>
	<span class="input__label">
		<h2>Inscripciones</h2>
		<a href="<?= $root ?>/inscripciones/registrar">Añadir</a>
		<table>
			<thead>
				<tr>
					<th>Estudiante</th>
					<th>Periodo</th>
					<th>Nivel</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($inscriptions as $inscription) echo <<<HTML
					<tr>
						<td>{$inscription->student->names}</td>
						<td>{$inscription->level->code}</td>
						<td>{$inscription->period->startYear}</td>
					</tr>
				HTML ?>
			</tbody>
		</table>
