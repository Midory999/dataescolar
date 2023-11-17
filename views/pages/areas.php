<?php

/** @var App\Models\Area[] $area */
/** @var string $root */
/** @var null|string $message */
?>

<article>
	<h2>Área</h2>
	<a href="<?= $root ?>/areas/registrar">Añadir</a>
	<table>
		<thead>
			<tr>
				<th>Nombre</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($areas as $area) echo <<<HTML
			<tr>
				<td>{$area->name}</td>
			HTML ?>
		</tbody>
	</table>
</article>
