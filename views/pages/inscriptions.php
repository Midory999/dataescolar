<?php

/** @var App\Models\Inscription[] $inscriptions */
/** @var string $root */
?>

<section class="w3-section">
	<h2 class="w3-xlarge">Inscripciones</h2>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/inscripciones/registrar">Añadir</a>
	<div class="w3-responsive w3-section">
		<table class="w3-table-all">
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
							<td>{$inscription->period->startYear}</td>
							<td>{$inscription->level->code}</td>
						</tr>
					HTML ?>
			</tbody>
		</table>
	</div>
</section>
