<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/lapsos" method="post">
	<h1>Registro de lapso</h1>

	<label for="id">ID:</label>
<input type="text" id="id" name="id" required><br></textarea>

<label for="id_periodo">ID de Periodo:</label>
	<select name="id_periodo" id="id_periodo">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($periods as $period) echo <<<HTML
		<option value="{$period->id}">
			{$period->names} {$period->lastnames}
		</option>
		HTML ?>
	</select>

	<label for="fecha_inicio">Fecha de Inicio:</label>
	<input type="date" id="fecha_inicio" name="fecha_inicio" required>

	<label for="fecha_fin">Fecha de Fin:</label>
	<input type="date" id="fecha_fin" name="fecha_fin" required>

   <label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required><br></textarea>

   <button>Registrar</button>
</form>