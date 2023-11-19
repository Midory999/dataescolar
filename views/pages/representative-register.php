<?php

/** @var string $root */
/** @var string $assets */
?>

<form action="<?= $root ?>/representantes" method="post">
	<h2>Registro de Representante</h2>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos personales</legend>
		<label class="input-group input-group--animate">
			<input class="input" type="number" name="cedula" required />
			<span class="input__label">Cédula:</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" name="nombre" required />
			<span class="input__label">Nombre:</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" name="apellido" required />
			<span class="input__label">Apellido:</span>
		</label>

		<label class="input-group">
			<span class="input__label">Genero:</span>
			<div class="select-container">
				<select class="select" name="genero" required>
					<option disabled selected>Seleccionar</option>
					<option value="masculino">Masculino</option>
					<option value="femenino">Femenino</option>
				</select>
			</div>
		</label>
	</fieldset>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos contacto</legend>
		<label class="input-group input-group--animate">
			<input class="input" name="direccion" required />
			<span class="input__label">Direccion:</span>
		</label>

		<label for="correo">Correo Electrónico:</label>
		<input type="email" id="correo" name="correo" required>

		<label for="telefono">Teléfono:</label>
		<input type="tel" id="telefono" name="telefono" required>

		<label for="estudio">Nivel de Instrución:</label>
		<select id="estudio" name="estudio" required>
			<option selected disabled>Seleccionar</option>
			<option value="primaria">Primaria</option>
			<option value="bachillerato">Bachillerato</option>
			<option value="universidad">Universidad</option>
			<option value="tecnico">Tecnico</option>
			<option value="sin_estudio">Sin estudio</option>
		</select>

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

		<label for="ocupacion">Ocupación:</label>
		<input id="ocupacion" name="ocupacion" required>

		<label for="lugar_trabajo">Lugar de Trabajo:</label>
		<input id="lugar_trabajo" name="lugar_trabajo" required>

		<label for="estudio_economico">Estudio Socioeconómico:</label>
		<select id="estudio_economico" name="estudio_economico" required>
			<option selected disabled>Seleccionar</option>
			<option value="bajos_recursos">Bajos Recursos</option>
			<option value="normal">Normal</option>
		</select>

		<button>Registrar</button>
</form>