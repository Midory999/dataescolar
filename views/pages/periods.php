<?php
	use App\Models\Period;
	/** @var Period[] $periods */
	/** @var string $root */
?>

<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css"
/>

<h1>Periodos</h1>
<a href="<?= $root ?>/periodos/registrar">Añadir</a>
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
				<td>{$period->getStartYear()}</td>
				<td>{$period->getEndYear()}</td>
			</tr>
		HTML ?>
	</tbody>
</table>
