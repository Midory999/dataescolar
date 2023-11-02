<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/estudiantes" method="post">
	<h1>Registro de estudiante</h1>

	 <label for="id">ID:</label>
<input type="text" id="id" name="id" required><br>

   <label for="id_representante">ID Representante:</label>
<input type="text" id="id_representante" name="id_representante" required><br>

   <label for="cedula">Cédula:</label>
<input type="text" id="cedula" name="cedula" required><br>

   <label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required><br>

   <label for="apellido">Apellido:</label>
<input type="text" id="apellido" name="apellido" required><br>

   <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

   <label for="lugar_nacimiento">Lugar de Nacimiento:</label>
<input type="text" id="lugar_nacimiento" name="lugar_nacimiento" required><br>

   <label for="edad">Edad:</label>
<input type="number" id="edad" name="edad" required><br>

   <label for="tipo_parto">Tipo de Parto:</label>
<select id="tipo_parto" name="tipo_parto" required><br>
  <option value="">Seleccionar</option>
  <option value="normal">Normal</option>
  <option value="cesarea">Cesárea</option>
</select>

   <label for="compromiso">Compromiso:</label>
<textarea id="compromiso" name="compromiso" required><br></textarea>

   <label for="medicamentos">Medicamentos:</label>
<textarea id="medicamentos" name="medicamentos" required><br></textarea>

   <label for="tipo_sangre">Tipo de Sangre:</label>
<input type="text" id="tipo_sangre" name="tipo_sangre" required><br>

   <label for="genero">Género:</label>
<select id="genero" name="genero" required><br>
  <option value="">Seleccionar</option>
  <option value="masculino">Masculino</option>
  <option value="femenino">Femenino</option>
</select>

   <label for="direccion">Dirección:</label>
<textarea id="direccion" name="direccion" required><br></textarea>

   <label for="medidas">Medidas:</label>
<textarea id="medidas"name="medidas" required><br></textarea>

   <label for="vacunas">Vacunas:</label>
<textarea id="vacunas" name="vacunas" required><br></textarea>

   <label for="programas_sociales">Programas Sociales:</label>
<textarea id="programas_sociales" name="programas_sociales" required><br></textarea>

   <label for="ingreso">Ingreso:</label>
<input type="number" id="ingreso" name="ingreso" required><br>

   <label for="estatus">Estatus:</label>
<select id="estatus" name="estatus" required><br>
  <option value="">Seleccionar</option>
  <option value="activo">Activo</option>
  <option value="inactivo">Inactivo</option>
</select>

   <label for="descripcion">Descripción:</label>
<textarea id="descripcion" name="descripcion" required><br></textarea>

   <button>Registrar</button>
</form>