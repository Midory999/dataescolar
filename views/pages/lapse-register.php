<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/lapsos" method="post">
	<h1>Registro de lapso</h1>

	<label for="id">ID:</label>
<input type="text" id="id" name="id" required><br></textarea>

   <label for="id_periodo">ID Periodo:</label>
<input type="text" id="id_periodo" name="id_periodo" required><br></textarea>

   <label for="inicio">Inicio:</label>
<input type="text" id="inicio" name="inicio" required><br></textarea>

   <label for="fin">Fin:</label>
<input type="text" id="fin" name="fin" required><br></textarea>

   <label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required><br></textarea>

   <button>Registrar</button>
</form>