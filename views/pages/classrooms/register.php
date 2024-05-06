<?php

/** @var string $root */
/** @var App\Models\Teacher[] $teachers */
?>

<form class="form" action="<?= $root ?>/aulas" method="post">
	<h1>Registro de Aula</h1>

	<div class="form__group">
		<label class="input-group ">
			<input class="input" name="nombre" required />
			<span class="input__label">Nombre:</span>
		</label>
		<label class="input-group">
			<span class="input__label">
				Asignar profesor:
				<a class="w3-button w3-pale-red w3-round-medium w3-hover-white w3-padding-small" href="<?= $root ?>/profesores/registrar">
					Registrar
				</a>
			</span>
			<div class="select-container">
				<select class="select" name="id_profesores" required>
					<option selected disabled>Seleccionar</option>
					<?php foreach ($teachers as $teacher) echo <<<HTML
					<option value="{$teacher->id}">
						CI. {$teacher->idCard}
						- {$teacher->getFirstName()}
						{$teacher->getFirstLastName()}
					</option>
					HTML ?>
				</select>
			</div>
		</label>
	</div>
	<button class="button button--half">Registrar</button>
</form>
