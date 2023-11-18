<?php

/** @var App\Models\Classroom[] $Classrooms */
/** @var string $root */
/** @var null|string $message */
?>

<h2>Aula</h2>
<a href="<?= $root ?>/aulas/registrar">
	<button>Añadir</button>
</a>
<table>
	<thead>
		<tr>
			<th>Nombre</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($classrooms as $classroom) echo <<<HTML
		<tr>
			<td>{$classroom->name}</td>
		</tr>
		HTML ?>
	</tbody>
</table>
