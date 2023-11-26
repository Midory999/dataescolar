<?php

/** @var App\Models\Period[] $periods */
/** @var string $root */
/** @var ?string $mensaje */

if ($mensaje) echo <<<HTML
<script>
	Swal.fire({
		title: '$mensaje',
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

<section>
	<h2>Periodos</h2>
	<a href="<?= $root ?>/periodos/registrar">Añadir</a>
	<table>
		<thead>
			<tr>
				<th>Fecha de Inicio</th>
				<th>Fecha de Cierre</th>
				<th>1er Lapso</th>
				<th>2er Lapso</th>
				<th>3er Lapso</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($periods as $period) echo <<<HTML
				<tr>
					<td>$period->startYear</td>
					<td>{$period->getEndYear()}</td>
					<td>{$period->getLapse(1)}</td>
					<td>{$period->getLapse(2)}</td>
					<td>{$period->getLapse(3)}</td>
				</tr>
			HTML ?>
		</tbody>
	</table>
</section>
