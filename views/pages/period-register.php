<?php

/** @var string $root */
?>

<form action="<?= $root ?>/periodos" method="post">
	<h2>Registro de periodo</h2>

	<label>
		<span>Año de inicio:</span>
	</label>
	<label for="inicio">Fecha de Inicio:</label>
	<input type="year" id="inicio" name="inicio" required />

	<label for="fin">Fecha de Cierre:</label>
	<input type="year" id="fin" name="fin" required />
	<button>Registrar</button>
</form>
