<?php

/** @var App\Models\Level[] $levels */
/** @var string $root */
/** @var null|string $message */
?>

<article>
	<h2>Nivel</h2>
	<a href="<?= $root ?>/niveles/registrar">
		<button>Añadir</button>
	</a>
	<table>
		<thead>
			<tr>
				<th>Nivel</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($levels as $level) echo <<<HTML
			<tr>
				<td>{$level->code}</td>
			HTML ?>
		</tbody>
		</tbody>
	</table>
</article>