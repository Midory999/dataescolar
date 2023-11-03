<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/profesores" method="post">
	<h1>Registro de profesore</h1>

	 <label for="id">ID:</label>
<input type="text" id="id" name="id" required><br>

   <label for="cedula">Cédula:</label>
<input type="number" id="cedula" name="cedula" required><br>

   <label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required><br>

   <label for="apellido">Apellido:</label>
<input type="text" id="apellido" name="apellido" required><br>

   <label for="estatus">Estatus:</label>
<select id="estatus" name="estatus" required><br>
  <option value="">Seleccionar</option>
  <option value="activo">Activo</option>
  <option value="inactivo">Inactivo</option>
</select>

   <label for="especialidad">Especialidad:</label>
<input type="text" id="especialidad" name="especialidad" required><br>

	 <label for="direccion">Dirección:</label>
<textarea id="direccion" name="direccion" required><br></textarea>

   <label for="correo">Correo:</label>
<input type="text" id="correo" name="correo" required><br>

   <label for="telefono">Teléfono:</label>
<input type="number" id="telefono" name="telefono" required><br>

	 <label for="ingreso">Ingreso:</label>
<input type="number" id="ingreso" name="ingreso" required><br>

   <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

   <label for="edad">Edad:</label>
<input type="number" id="edad" name="edad" required><br>

	 <label for="genero">Género:</label>
<select id="genero" name="genero" required><br>
  <option value="">Seleccionar</option>
  <option value="masculino">Masculino</option>
  <option value="femenino">Femenino</option>
</select>

   <label for="vacunas">Vacunas:</label>
<textarea id="vacunas" name="vacunas" required><br></textarea>

   <label for="carga_horaria">Carga Horaria:</label>
<input type="number" id="carga_horaria" name="carga_horaria" required><br>

   <label for="codigo_independencia">Código de Independencia:</label>
<input type="text" id="codigo_independencia" name="codigo_independencia" required><br>

   <label for="codigo_area">Código de Área:</label>
<input type="text" id="codigo_area" name="codigo_area" required><br>

	 <button>Registrar</button>
</form>