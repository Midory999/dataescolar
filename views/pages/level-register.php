<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/niveles" method="post">
	<h1>Registro de nivel</h1>

	 <label for="id">ID:</label>
<input type="text" id="id" name="id" required><br>

   <label for="codigo">Código:</label>
<input type="text" id="codigo" name="codigo" required><br>

   <button>Registrar</button>
</form>