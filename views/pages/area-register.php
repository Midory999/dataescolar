<?php

use App\Models\Area;

/**
 * @var ?Area $lastArea
 */

?>

<form class="form" action="./areas" method="post">
	<h2>Registro de Área</h2>
	<div class="form__group">
		<label class="input-group ">
			<input
				readonly
				disabled
				value="<?= $lastArea?->getCode() ?>"
				class="input"
				type="number"
				name="codigo"
				min="1"
				required
			/>
			<span class="input__label">Código:</span>
		</label>
		<label class="input-group ">
			<input class="input" name="nombre" required />
			<span class="input__label">Nombre:</span>
		</label>
	</div>
	<button class="button button--half">Registrar</button>
</form>
