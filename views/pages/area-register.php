<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/areas" method="post">
	<h1>Registro de área</h1>

	<label for="codigo_area">Código:</label>
<input type="text" id="codigo_area" name="codigo_area" required><br>

	 <label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required><br>

   <button>Registrar</button>
</form>