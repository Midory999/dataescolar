<?php
/** @var string $root */
/** @var App\Models\Period[] $periods */
?>

<form action="<?= $root ?>/lapsos" method="post">
	<h1>Registro de lapso</h1>
	<label for="id_periodo">Periodo:</label>
	<select name="id_periodo" id="id_periodo">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($periods as $period) echo <<<HTML
		<option value="{$period->getID()}">{$period}</option>
		HTML ?>
	</select>

	<label for="fecha_inicio">Fecha de Inicio:</label>
	<input type="date" id="fecha_inicio" name="fecha_inicio" required />

	<label for="fecha_fin">Fecha de Fin:</label>
	<input type="date" id="fecha_fin" name="fecha_fin" required />

	<label for="nombre">Nombre:</label>
	<input id="nombre" name="nombre" required />
	<button>Registrar</button>
</form>
