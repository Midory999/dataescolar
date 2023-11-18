<?php

/** @var string $root */
?>

<form action="<?= $root ?>/inscripciones" method="post">
	<h1>Registro de Inscripcione</h1>

	<label for="id_estudiante">Estudiante:</label>
	<select name="id_estudiante" id="id_estudiante">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($students as $student) echo <<<HTML
		<option value="{$student->id}">
			{$student->idCard} - {$student->names}
		</option>
		HTML ?>
	</select>

	<label for="id_nivel">Nivel:</label>
	<select name="id_nivel" id="id_nivel">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($levels as $level) echo <<<HTML
		<option value="{$level->id}">
			{$level->id} - {$level->code}
		</option>
		HTML ?>
	</select>

	<label for="id_periodo">Periodo:</label>
	<select name="id_periodo" id="id_periodo">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($periods as $period) echo <<<HTML
		<option value="{$period->id}">
			{$period->getID} - {$period->startYear}
		</option>
		HTML ?>
	</select>

	<button>Registrar</button>
</form>