<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/niveles" method="post">
	<h1>Registro de nivel</h1>

	 <label for="id">ID:</label>
<input type="text" id="id" name="id" required><br>

   <label for="codigo_nivel">Código de Nivel:</label>
<input type="text" id="codigo_nive" name="codigo_nivel" required><br>

   <button>Registrar</button>
</form>