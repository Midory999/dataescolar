<?php

/** @var string $root */
?>

<form action="<?= $root ?>/inscripciones" method="post">
	<h1>Registro de inscripcione</h1>

	<label for="id_estudiante">Estudiante:</label>
	<select name="id_estudiante" id="id_estudiante">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($students as $student) echo <<<HTML
		<option value="{$student->id}">
			{$student->idCard} - {$student->names}
		</option>
		HTML ?>
	</select>

	<label for="id_periodo">Periodo:</label>
	<select name="id_periodo" id="id_periodo">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($periods as $period) echo <<<HTML
		<option value="{$period->id}">
			{$period->id} - {$period->startYear}
		</option>
		HTML ?>
	</select>

	<label for="id_nivel">Nivel:</label>
	<input type="text" id="id_nivel" name="id_nivel" required><br>

	<button>Registrar</button>
</form>