<?php
/** @var string $root */
/** @var App\Models\Representative[] $representatives */
?>

<form action="<?= $root ?>/estudiantes" method="post">
	<h2>Registro de estudiante</h2>

	<label for="id_representante">Representante:</label>
	<select name="id_representante" id="id_representante">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($representatives as $representative) echo <<<HTML
		<option value="{$representative->id}">
			{$representative->names} {$representative->lastnames}
		</option>
		HTML ?>
	</select>

	<label for="cedula">Cédula:</label>
	<input id="cedula" name="cedula" required>

	<label for="nombre">Nombre:</label>
	<input id="nombre" name="nombre" required>

	<label for="apellido">Apellido:</label>
	<input id="apellido" name="apellido" required>

	<label for="fecha_nacimiento">Fecha de Nacimiento:</label>
	<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

	<label for="lugar_nacimiento">Lugar de Nacimiento:</label>
	<input type="text" id="lugar_nacimiento" name="lugar_nacimiento" required>

	<label for="edad">Edad:</label>
	<input type="number" id="edad" name="edad" required>

	<label for="tipo_parto">Tipo de Parto:</label>
	<select id="tipo_parto" name="tipo_parto" required>
		<option selected disabled>Seleccionar</option>
		<option value="normal">Normal</option>
		<option value="cesarea">Cesárea</option>
	</select>

	<label for="compromiso">Compromiso:</label>
	<textarea id="compromiso" name="compromiso" required></textarea>

	<label for="medicamentos">Medicamentos:</label>
	<textarea id="medicamentos" name="medicamentos" required></textarea>

	<label for="tipo_sangre">Tipo de Sangre:</label>
	<select id="tipo_sangre" name="tipo_sangre" required>
		<option selected disabled>Seleccionar</option>
		<option value="AB+">AB+</option>
		<option value="AB-">AB-</option>
		<option value="A+">A+</option>
		<option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="O+">O+</option>
		<option value="O-">O-</option>
	</select>

	<label for="genero">Género:</label>
	<select id="genero" name="genero" required>
		<option selected disabled>Seleccionar</option>
		<option value="masculino">Masculino</option>
		<option value="femenino">Femenino</option>
	</select>

	<label for="direccion">Dirección:</label>
	<textarea id="direccion" name="direccion" required></textarea>

	<label for="medidas">Medidas:</label>
	<textarea id="medidas" name="medidas" required></textarea>

	<label for="vacunas">Vacunas:</label>
	<textarea id="vacunas" name="vacunas" required></textarea>

	<label for="programas_sociales">Programas Sociales:</label>
	<textarea id="programas_sociales" name="programas_sociales" required></textarea>

	<label for="ingreso">Ingreso:</label>
	<input type="number" id="ingreso" name="ingreso" required>

	<label for="estatus">Estatus:</label>
	<select id="estatus" name="estatus" required>
		<option selected disabled>Seleccionar</option>
		<option value="activo">Activo</option>
		<option value="inactivo">Inactivo</option>
	</select>

	<label for="descripcion">Descripción:</label>
	<textarea id="descripcion" name="descripcion" required></textarea>

	<button>Registrar</button>
</form>
