<?php

/** @var string $root */
/** @var App\Models\Teacher[] $teachers */
?>

<form class="form" action="<?= $root ?>/aulas" method="post">
	<h1>Registro de aula</h1>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos aula</legend>
		<label class="input-group input-group--animate">
			<input class="input" name="nombre" required />
			<span class="input__label">Nombre:</span>
		</label>

		<label class="input-group">
			<span class="input__label">Profesore:</span>
			<div class="select-container">
				<select class="select" name="id_profesores" id="id_profesores" required>
					<option selected disabled>Seleccionar</option>
					<?php foreach ($teachers as $teacher) echo <<<HTML
		<option value="{$teacher->id}">
			{$teacher->idCard} {$teacher->names}
		</option>
		HTML ?>
				</select>
			</div>
		</label>
		<button>Registrar</button>
</form>
