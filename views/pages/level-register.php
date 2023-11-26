<?php

/** @var string $root */
?>

<form action="<?= $root ?>/niveles" method="post">
	<h1>Registro de Nivel</h1>

	<label>
		<span>Código:</span>
		<input type="number" name="codigo" min="1" required />
	</label>

	<label for="nombre">Nivel:</label>
	<select id="nombre" name="nombre" required>
		<option selected disabled>Seleccionar</option>
		<option value="nivel_1">Nivel 1</option>
		<option value="nivel_2">Nivel 2</option>
	</select>
	<button>Asignar</button>
</form>