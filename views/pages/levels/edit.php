<?php

use App\Models\Level;

/** @var string $root */
/** @var Level $level */

?>

<form class="form" method="post">
	<h2>Editar nivel</h2>

	<label class="input-group input-group--animate">
		<input class="input" name="codigo" required value="<?= $level->code ?>" />
		<span class="input__label">Código:</span>
	</label>

	<button class="button button--half">Actualizar</button>
</form>
