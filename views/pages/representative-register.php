<?php

/** @var string $root */
/** @var string $assets */
?>

<form class="form" action="<?= $root ?>/representantes" method="post">
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

		<label class="input-group input-group--animate">
			<input class="input" type="email" name="correo" required />
			<span class="input__label">Correo:</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" type="tel" name="telefono" required />
			<span class="input__label">Teléfono:</span>
		</label>
	</fieldset>

	<!-- 	<legend class="form__group-legend">Datos médicos</legend>
	<label class="input-group">
		<span class="input__label">Vacunas:</span>
		<div class="select-container select-container--simple">
			<select class="select" name="vacunas[]" multiple>
				<option value="hepatitis_b">Hepatitis B</option>
				<option value="covid_19">COVID-19</option>
				<option value="gripe">Gripe</option>
				<option value="vph">VPH</option>
			</select>
		</div>
	</label> -->

	<label class="input-group">
		<span class="input__label">Tipo de Sangre:</span>
		<div class="select-container">
			<select class="select" id="tipo_sangre" name="tipo_sangre" required>
				<option selected disabled>Seleccionar</option>
				<option value="A+">A+</option>
				<option value="A-">A-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				<option value="AB+">AB+</option>
				<option value="AB-">AB-</option>
			</select>
		</div>
	</label>
	</fieldset>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos descriptivo</legend>
		<label class="input-group input-group--animate">
			<input class="input" id="ocupacion" name="ocupacion" required>
			<span class="input__label">Ocupación:</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" id="lugar_trabajo" name="lugar_trabajo" required>
			<span class="input__label">Lugar de Trabajo:</span>
		</label>

		<label class="input-group">
			<span class="input__label">Nivel de Instrución:</span>
			<div class="select-container">
				<select class="select" id="estudio" name="estudio" required>
					<option selected disabled>Seleccionar</option>
					<option value="primaria">Primaria</option>
					<option value="bachillerato">Bachillerato</option>
					<option value="universidad">Universidad</option>
					<option value="tecnico">Tecnico</option>
					<option value="sin_estudio">Sin estudio</option>
				</select>
			</div>
		</label>

		<label class="input-group input-group--animate">
			<label class="input-group">
				<span class="input__label">Estudio Socioeconómico:</span>
				<div class="select-container">
					<select class="input" id="estudio_economico" name="estudio_economico" required>
						<option selected disabled>Seleccionar</option>
						<option value="bajos_recursos">Bajos Recursos</option>
						<option value="normal">Normal</option>
					</select>
				</div>
			</label>
			<button class="button button--half">Registrar</button>
</form>