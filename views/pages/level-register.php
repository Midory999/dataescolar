<?php

/** @var string $root */
?>

<form class="form" action="<?= $root ?>/niveles" method="post">
	<h2>Registro de Nivel</h2>

	<label class="input-group input-group--animate">
		<input class="input" name="codigo" required />
		<span class="input__label">Código:</span>
	</label>

	<button class="button button--half">Registro</button>
</form>
