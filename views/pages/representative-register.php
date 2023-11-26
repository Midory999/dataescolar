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
			<span class="input__label">Correo Electrónico:</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" type="tel" name="telefono" required />
			<span class="input__label">Teléfono:</span>
		</label>
	</fieldset>

	<label class="input-group">
		<span class="input__label">Tipo de Sangre:</span>
		<div class="select-container">
			<select class="select" name="tipo_sangre" required>
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
		<label class="input-group input-group--animate">
			<input class="input" name="ocupacion" required>
			<span class="input__label">Ocupación:</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" name="lugar_trabajo" required>
			<span class="input__label">Lugar de Trabajo:</span>
		</label>

		<label class="input-group">
			<span class="input__label">Estudio Socioeconómico:</span>
			<div class="select-container">
				<select class="select" name="estudio_economico" required>
					<option selected disabled>Seleccionar</option>
					<option value="bajos_recursos">Bajos Recursos</option>
					<option value="normal">Normal</option>
				</select>
			</div>
		</label>
	</fieldset>
	<button class="button button--half">Registrar</button>
</form>
