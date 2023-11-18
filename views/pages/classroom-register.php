<?php

/** @var string $root */
/** @var App\Models\Teacher[] $teachers */
?>

<form action="<?= $root ?>/" method="post">
	<h1>Registro de aula</h1>

	<label for="nombre">Nombre:</label>
	<input type="text" id="nombre" name="nombre" required><br>

	<label for="id_profesores">Profesore:</label>
	<select name="id_profesores" id="id_profesores">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($teachers as $teacher) echo <<<HTML
		<option value="{$teacher->id}">
			{$teacher->idCard} {$teacher->names}
		</option>
		HTML ?>
	</select>

	<button>Registrar</button>
</form>