<?php

/** @var App\Models\Lapse[] $lapses */
/** @var string $root */
/** @var null|string $message */
?>

<h2>Lapso</h2>
<a href="<?= $root ?>/lapsos/registrar">
	<button>Añadir</button>
</a>
<table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Fecha de Inicio</th>
			<th>Fecha de Fin</th>
			<th>Periodo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($lapses as $lapse) echo <<<HTML
		<tr>
			<td>{$lapse->name}</td>
			<td>{$lapse->start}</td>
			<td>{$lapse->end}</td>
			<td>{$lapse->period}</td>
		</tr>
		HTML ?>
	</tbody>
</table>
