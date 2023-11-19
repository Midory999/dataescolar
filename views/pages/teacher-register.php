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
		<legend class="form__group-legend">Datos referencia</legend>
		<label class="input-group input-group--animate">
			<input class="input" name="especialidad" required />
			<span class="input__label">Especialidad:</span>
		</label>

		<label class="input-group">
			<span class="input__label">Estatus:</span>
			<div class="select-container">
				<select class="select" name="estatus" required>
					<option disabled selected>Seleccionar</option>
					<option value="Activo">Activo</option>
					<option value="Jubilado">Jubilado</option>
					<option value="Proceso de jubilación">Proceso de Jubilación</option>
					<option value="Reposo médico">Reposo médico</option>
				</select>
			</div>
		</label>

		<label class="input-group">
			<span class="input__label">Area:</span>
			<div class="select-container">
				<select class="select" name="id_area" id="id_area">
					<option selected disabled>Seleccionar</option>
					<?php foreach ($areas as $area) echo <<<HTML
					<option value="{$area->getCode()}">{$area->name}</option>
					HTML ?>
				</select>
			</div>
		</label>
		<label class="input-group">
			<input class="input" type="date" name="ingreso" required />
			<span class="input__label">Ingreso:</span>
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
	<fieldset class="form__group">
		<legend class="form__group-legend">Datos médicos</legend>
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
		</label>
	</fieldset>
	<label class="input-group input-group--animate">
		<input class="input" name="carga_horaria" required />
		<span class="input__label">Carga Horaria:</span>
	</label>
	<label class="input-group input-group--animate">
		<input class="input" name="codigo_independencia" required />
		<span class="input__label">Código de Independencia:</span>
	</label>
	<button class="button button--half">Registrar</button>
</form>