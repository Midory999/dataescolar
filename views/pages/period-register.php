<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/inscripciones" method="post">
	<h1>Registro de periodo</h1>

	<label for="id">ID:</label>
<input type="text" id="id" name="id" required><br></textarea>

<label for="fecha_periodo">Fecha de Periodo:</label>
	<input type="date" id="fecha_periodo" name="fecha_periodo" required>
	/>
	<button>Registrar</button>
</form>
