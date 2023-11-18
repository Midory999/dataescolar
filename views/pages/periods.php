<?php

/** @var App\Models\Period[] $periods */
/** @var string $root */
?>

<section>
	<h2>Periodos</h2>
	<a href="<?= $root ?>/periodos/registrar">
		<button>Añadir</button>
	</a>
	<table>
		<thead>
			<tr>
				<th>Fecha de Inicio</th>
				<th>Fecha de Cierre</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($periods as $period) echo <<<HTML
				<tr>
					<td>$period->startYear</td>
					<td>{$period->getEndYear()}</td>
				</tr>
			HTML ?>
		</tbody>
	</table>
</section>
