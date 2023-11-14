<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/inscripciones" method="post">
	<h1>Registro de aula</h1>

	 <label for="id">ID:</label>
<input type="text" id="id" name="id" required><br>

   <label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required><br>

<label for="id_profesore">ID de Profesore:</label>
	<select name="id_profesore" id="id_profesore">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($teachers as $teacher) echo <<<HTML
		<option value="{$teacher->id}">
			{$teacher->names} {$teacher->lastnames}
		</option>
		HTML ?>
	</select>

<label for="id_estudiante">ID de Estudiante:</label>
	<select name="id_estudiante" id="id_estudiante">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($students as $student) echo <<<HTML
		<option value="{$student->id}">
			{$student->names} {$student->lastnames}
		</option>
		HTML ?>
	</select>

   <button>Registrar</button>
</form>