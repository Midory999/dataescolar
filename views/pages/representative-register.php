<?php

/** @var string $root */
?>

<form action="<?= $root ?>/representantes" method="post">
	<h2>Registro de Representante</h2>

	<label for="cedula">Cédula:</label>
	<input type="number" id="cedula" name="cedula" required>

	<label for="nombre">Nombre:</label>
	<input id="nombre" name="nombre" required>

	<label for="apellido">Apellido:</label>
	<input id="apellido" name="apellido" required>

	<label for="genero">Género:</label>
	<select id="genero" name="genero" required>
		<option selected disabled>Seleccionar</option>
		<option value="masculino">Masculino</option>
		<option value="femenino">Femenino</option>
	</select>

	<label for="direccion">Dirección:</label>
	<textarea id="direccion" name="direccion" required></textarea>

	<label for="correo">Correo:</label>
	<input type="email" id="correo" name="correo" required>

	<label for="telefono">Teléfono:</label>
	<input type="tel" id="telefono" name="telefono" required>

	<label for="estudio">Estudio:</label>
	<select id="estudio" name="estudio" required>
		<option selected disabled>Seleccionar</option>
		<option value="primaria">Primaria</option>
		<option value="bachillerato">Bachillerato</option>
		<option value="universidad">Universidad</option>
		<option value="tecnico">Tecnico</option>
		<option value="sin_estudio">Sin estudio</option>
	</select>

	<label for="tipo_sangre">Tipo de Sangre:</label>
	<input id="tipo_sangre" name="tipo_sangre" required>

	<label for="ocupacion">Ocupación:</label>
	<input id="ocupacion" name="ocupacion" required>

	<label for="lugar_trabajo">Lugar de Trabajo:</label>
	<input id="lugar_trabajo" name="lugar_trabajo" required>

	<button>Registrar</button>
</form>
