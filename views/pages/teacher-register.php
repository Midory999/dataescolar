<?php

/** @var App\Models\Area[] $areas */
/** @var string $root */
/** @var string $assets */
?>

<form class="form" action="<?= $root ?>/profesores" method="post">
	<h2>Registro de profesor/a</h2>

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
			<input class="input" type="date" name="fecha_nacimiento" required />
			<span class="input__label">Fecha de Nacimiento:</span>
		</label>

		<label class="input-group">
			<span class="input__label">Sexo:</span>
			<div class="select-container">
				<select class="select" name="genero" required>
					<option disabled selected>Seleccionar</option>
					<option value="masculino">Masculino</option>
					<option value="femenino">Femenino</option>
				</select>
			</div>
		</label>
	</fieldset>

	<label>
		Estatus:
		<select name="estatus" required>
			<option disabled selected>Seleccionar</option>
			<option value="Activo">Activo</option>
			<option value="Jubilado">Jubilado</option>
			<option value="Proceso de jubilación">Proceso de Jubilación</option>
			<option value="Reposo médico">Reposo médico</option>
		</select>
	</label>

	<label>
		Especialidad:
		<input name="especialidad" required />
	</label>

	<fieldset>
		<legend>Datos de contacto</legend>
		<label>
			Dirección:
			<textarea name="direccion" required></textarea>
		</label>

		<label>
			Correo:
			<input type="email" name="correo" required />
		</label>

		<label>
			Teléfono:
			<input type="tel" name="telefono" required />
		</label>
	</fieldset>

	<label>
		Fecha de Ingreso:
		<input type="date" name="ingreso" required />
	</label>

	<label id="vacunas">Selecciona las vacunas:</label>
	<select name="vacunas[]" id="vacunas" multiple>
		<option value="hepatitis_b">Hepatitis B</option>
		<option value="covid_19">COVID-19</option>
		<option value="gripe">Gripe</option>
		<option value="vph">VPH</option>
	</select>

	<label for="carga_horaria">Carga Horaria:</label>
	<input id="carga_horaria" name="carga_horaria" required />

	<label for="codigo_independencia">Código de Independencia:</label>
	<input id="codigo_independencia" name="codigo_independencia" required />

	<label for="id_area">Area:</label>
	<select name="id_area" id="id_area">
		<option selected disabled>Seleccionar</option>
		<?php foreach ($areas as $area) echo <<<HTML
		<option value="{$area->getCode()}">{$area->name}</option>
		HTML ?>
	</select>
	<button>Registrar</button>
</form>
