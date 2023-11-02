<?php
	/** @var string $root */
?>

<form action="<?= $root ?>/estudiantes" method="post">
	<h1>Registro de estudiante</h1>
	<label for="id">ID</label>
	<input
	typye="text"
	name="id"
	id="id" required>

 <label for="id_representante">ID Representante:</label>
 <input type="text" name="id_representante" id="id_representante" required>

 <label for="cedula">Cédula:</label>
 <input type="text" name="cedula" id="cedula" required>

 <label for="nombre">Nombre:</label>
 <input type="text" name="nombre" id="nombre" required>

 <label for="apellido">Apellido:</label>
 <input type="text" name="apellido" id="apellido" required>

 <label for="fecha_nacimiento">Fecha de nacimiento:</label>
 <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>

 <label for="lugar_nacimiento">Lugar de nacimiento:</label>
 <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" required>

 <label for="edad">Edad:</label>
 <input type="number" name="edad" id="edad" required>

 <label for="tipo_parto">Tipo de parto:</label>
 <input type="text" name="tipo_parto" id="tipo_parto">

 <label for= "compromiso">Compromiso:</label>
 <textarea name= "compromiso" id= "compromiso"></textarea>

<label for= "medicamentos">Medicamentos:</label>
<textarea name= "medicamentos" id= "medicamentos"></textarea>

<label for= "tipo_sangre">Tipo de sangre:</label>
<input type= "text" name= "tipo_sangre" id= "tipo_sangre">

<label for= "genero">Género:</label>
<input type= "text" name= "genero" id= "genero">

<label for= "direccion">Dirección:</label>
<textarea name= "direccion" id= "direccion"></textarea>

<label for= "medidas">Medidas:</label>
<textarea name= "medidas" id= "medidas"></textarea>

<label for= "vacunas">Vacunas:</label>
<textarea name= "vacunas" id= "vacunas"></textarea>

<label for= "programas_sociales">Programas sociales:</label>
<textarea name= "programas_sociales" id= "programas_sociales"></textarea>

<label for="ingreso">Ingreso:</label>
<input type="number" name="ingreso" id="ingreso">

<label for="estatu">Estatu:</label>
<input type="text" name="estatu" id="estatu">

<label for="descripcion">Descripción:</label>
<textarea name="descripcion" id="descripcion"></textarea>

 <input type="submit" value="Registrar">

	<button>Registrar</button>
</form>
