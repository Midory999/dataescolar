<?php

/** @var string $root */
?>

<form action="<?= $root ?>/areas" method="post">
	<h1>Registro de área</h1>

	<label>
		<span>Código:</span>
		<input type="number" name="codigo" min="1" required />
	</label>
	<label for="nombre">Nombre:</label>
	<input id="nombre" name="nombre" required />

	<button>Registrar</button>
</form>