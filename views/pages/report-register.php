<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/informes" method="post">
	<h1>Registro de informe</h1>

	 <label for="id">ID:</label>
<input type="text" id="id" name="id" required><br>

<label for="diagnostico">Diagnóstico:</label>
<textarea name="diagnostico" required></textarea><br>

<label for="lapso1">Lapso 1:</label>
<textarea name="lapso1" required></textarea><br>

<label for="lapso2">Lapso 2:</label>
<textarea name="lapso2" required></textarea><br>

<label for="lapso3">Lapso 3:</label>
<textarea name="lapso3" required></textarea><br>

<label for="informe_final">Informe Final:</label>
<textarea name="informe_final" required></textarea><br>

<label for="id_estudiante">ID de Estudiante:</label>
	<select name="id_estudiante" id="id_estudiante">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($students as $student) echo <<<HTML
		<option value="{$student->id}">
			{$student->names} {$student->lastnames}
		</option>
		HTML ?>
	</select>

	<label for="id_profesore">ID de Profesore:</label>
	<select name="id_profesore" id="id_profesore">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($teachers as $teacher) echo <<<HTML
		<option value="{$teacher->id}">
			{$teacher->names} {$teacher->lastnames}
		</option>
		HTML ?>
	</select>

	<label for="codigo_area">Código de Area:</label>
	<select name="codigo_area" id="codigo_area">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($areas as $area) echo <<<HTML
		<option value="{$area->id}">
			{$area->names} {$area->lastnames}
		</option>
		HTML ?>
	</select>

	<label for="id_nivel">ID de Nivel:</label>
	<select name="id_nivel" id="id_nivel">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($levels as $level) echo <<<HTML
		<option value="{$level->id}">
			{$level->names} {$level->lastnames}
		</option>
		HTML ?>
	</select>

 <button>Registrar</button>
</form>
