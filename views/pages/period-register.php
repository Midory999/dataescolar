<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/inscripciones" method="post">
	<h1>Registro de periodo</h1>

<label for="fecha_periodo">Fecha de Inicio:</label>
	<input type="date" id="fecha_periodo" name="fecha_periodo" required>

	<label for="fecha_periodo">Fecha de Cierre:</label>
	<input type="date" id="fecha_periodo" name="fecha_periodo" required>
	/>
	<button>Registrar</button>
</form>
