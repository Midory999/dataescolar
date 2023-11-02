<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/inscripciones" method="post">
	<h1>Registro de inscripcione</h1>

	 <label for="id">ID:</label>
<input type="text" id="id" name="id" required><br>

   <label for="id_estudiante">ID de Estudiante:</label>
<input type="text" id="id_estudiante" name="id_estudiante" required><br>

   <label for="id_periodo">ID de Periodo:</label>
<input type="text" id="id_periodo" name="id_periodo" required><br>

   <label for="id_nivel">ID de Nivel:</label>
<input type="text" id="id_nivel" name="id_nivel" required><br>

   <button>Registrar</button>
</form>