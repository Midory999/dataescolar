<?php

/** @var App\Models\Inscription[] $inscription */
/** @var string $root */
?>

<section>
	<span class="input__label">
		<h2>Inscripciones</h2>
		<a href="<?= $root ?>/inscripciones/registrar">
			<button>Añadir</button>
		</a>
		<table>
			<thead>
				<tr>
					<th>Estudiante</th>
					<th>Periodo</th>
					<th>Nivel</th>
				</tr>
			</thead>
			</tbody>
			<?php foreach ($inscriptions as $inscription) echo <<<HTML
		  <td>{$inscription->students}</td>
			<td>{$inscription->levels}</td>
			<td>{$inscription->periods}</td>
			</tr>
HTML  ?>
			</tbody>
		</table>