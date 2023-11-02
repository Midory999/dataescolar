<?php
	use App\Models\Student;
	/** @var Student[] $students */
	/** @var string $root */
?>

<h2>estudiante</h2>
<a href="<?= $root ?>/estudiantes/registrar">
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
		<?php foreach ($students as $student) echo <<<HTML
			<tr>
				<td>{$student->()}</td>
				<td>{$student->()}</td>
			</tr>
		HTML ?>
	</tbody>
</table>
