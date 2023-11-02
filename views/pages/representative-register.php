<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/representantes" method="post">
	<h1>Registro de Representante</h1>

	 <label for="id">ID:</label>
<input type="text" id="id" name="id" required><br>

   <label for="cedula">Cédula:</label>
<input type="text" id="cedula" name="cedula" required><br>

   <label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required><br>

   <label for="apellido">Apellido:</label>
<input type="text" id="apellido" name="apellido" required><br>

   <label for="genero">Género:</label>
<select id="genero" name="genero" required><br>
  <option value="">Seleccionar</option>
  <option value="masculino">Masculino</option>
  <option value="femenino">Femenino</option>
</select>

   <label for="direccion">Dirección:</label>
<textarea id="direccion" name="direccion" required><br></textarea>

   <label for="correo">Correo:</label>
<input type="text" id="correo" name="correo" required><br>

   <label for="telefono">Teléfono:</label>
<input type="number" id="telefono" name="telefono" required><br>

   <label for="estudio">Estudio:</label>
<select id="estudio" name="estudio" required><br>
  <option value="">Seleccionar</option>
	<option value="primaria">Primaria</option>
	<option value="bachillerato">Bachillerato</option>
	<option value="universidad">Universidad</option>
	<option value="tecnico">Tecnico</option>
	<option value="sin_estudio">Sin estudio</option>
</select>

   <label for="tipo_sangre">Tipo de Sangre:</label>
<input type="text" id="tipo_sangre" name="tipo_sangre" required><br>

   <label for="ocupacion">Ocupación:</label>
<input type="text" id="ocupacion" name="ocupacion" required><br>

   <label for="lugar_trabajo">Lugar de Trabajo:</label>
<input type="text" id="lugar_trabajo" name="lugar_trabajo" required><br>

   <button>Registrar</button>
</form>