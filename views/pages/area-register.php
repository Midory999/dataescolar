<?php

/** @var string $root */
/** @var string $assets */
?>

<form class="form" action="<?= $root ?>/areas" method="post">
	<h1>Registro de área</h1>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos personales</legend>
		<label class="input-group input-group--animate">
			<input class="input" type="number" name="codigo" min="1" required />
			<span class="input__label">Código:</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" name="nombre" required />
			<span class="input__label">Nombre:</span>
		</label>
	</fieldset>
	<button>Registrar</button>
</form>