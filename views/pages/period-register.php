<?php

/** @var string $root */
?>

<form action="<?= $root ?>/periodos" method="post">
	<h1>Registro de periodo</h1>

	<label for="inicio">Fecha de Inicio:</label>
	<input type="year" id="inicio" name="inicio" required />

	<label for="fin">Fecha de Cierre:</label>
	<input type="year" id="fin" name="fin" required />
	<button>Registrar</button>
</form>
