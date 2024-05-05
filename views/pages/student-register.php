<?php

/** @var string $root */
/** @var string $assets */
/** @var App\Models\Representative[] $representatives */
?>

<style>
	.input__label .w3-button {
		transition: 250ms all;
	}
</style>

<form class="form" action="<?= $root ?>/estudiantes" method="post">
	<h2>Registro de Estudiante</h2>

	<fieldset class="form__group form__group--padding-top">
		<legend class="form__group-legend">Datos personales</legend>
		<label class="input-group">
			<span class="input__label">
				Representante:
				<a class="w3-button w3-pale-red w3-round-medium w3-hover-white w3-padding-small" href="<?= $root ?>/representantes/registrar">Registrar</a>
			</span>
			<div class="select-container">
				<select class="select" name="id_representante">
					<option selected disabled>Seleccionar</option>
					<?php foreach ($representatives as $representative) echo <<<HTML
					<option value="{$representative->id}">
						v{$representative->idCard} - {$representative->names} {$representative->lastnames}
					</option>
					HTML ?>
				</select>
			</div>
		</label>

		<label class="input-group">
			<input class="input" type="number" name="cedula" required />
			<span class="input__label">
				Cédula del estudiante:
				<a class="w3-button w3-pale-red w3-round-medium w3-hover-white w3-padding-small" style="visibility: hidden">&nbsp;</a>
			</span>
		</label>

		<label class="input-group ">
			<input class="input" name="nombre" required />
			<span class="input__label">Nombre:</span>
		</label>

		<label class="input-group ">
			<input class="input" name="apellido" required />
			<span class="input__label">Apellido:</span>
		</label>

		<label class="input-group">
			<input class="input" type="date" name="fecha_nacimiento" required />
			<span class="input__label">Fecha de Nacimiento:</span>
		</label>

		<label class="input-group ">
			<input class="input" name="lugar_nacimiento" required>
			<span class="input__label">Lugar de Nacimiento:</span>
		</label>
		<label class="input-group">
			<input class="input" name="direccion" required />
			<span class="input__label">Dirección:</span>
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
	<fieldset class="form__group form__group--padding-top">
		<legend class="form__group-legend">Datos médicos</legend>
		<label class="input-group">
			<span class="input__label">Tipo de Parto:</span>
			<div class="select-container">
				<select class="select" name="tipo_parto" required>
					<option value="normal">Normal</option>
					<option value="cesarea">Cesárea</option>
					<option value="complicado">Complicado</option>
				</select>
			</div>
		</label>
		<label class="input-group ">
			<input class="input" name="medicamentos" required />
			<span class="input__label">Medicamentos:</span>
		</label>

		<label class="input-group">
			<span class="input__label">Compromiso:</span>
			<div class="select-container select-container--simple">
				<select class="select" name="compromiso" multiple>
					<option value="retardo_mental">Retardo Mental</option>
					<option value="sindrome_down">Síndrome de Down</option>
					<option value="autismo">Autismo</option>
					<option value="deficiencia_visual">Deficiencia Visual</option>
					<option value="deficiencia:auditiva">Deficiencia Auditiva</option>
					<option value="impedimento_fisico">Impedimento Físico</option>
				</select>
			</div>
		</label>

		<label class="input-group">
			<span class="input__label">Vacunas:</span>
			<div class="select-container select-container--simple">
				<select class="select" name="vacunas" multiple>
					<option value="hepatitis_b">Hepatitis B</option>
					<option value="dtap">DTaP</option>
					<option value="hib">Hib</option>
					<option value="rotavirus">Rotavirus</option>
					<option value="covid_19">COVID-19</option>
					<option value="gripe">Gripe</option>
					<option value="varicela">Varicela</option>
					<option value="mmr">MMR</option>
					<option value="hepatitis_a">Hepatitis A</option>
					<option value="vph">VPH</option>
				</select>
			</div>
		</label>

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
		<legend class="form__group-legend">Medidas Antropométricas</legend>
		<label class="input-group ">
			<input class="input" name="pregunta1">
			<span class="input__label">Peso Corporal(kg):</span>
		</label>

		<label class="input-group ">
			<input class="input" name="pregunta2">
			<span class="input__label">Talla(cm):</span>
		</label>

		<label class="input-group ">
			<input class="input" name="pregunta3">
			<span class="input__label">Talla de calzado:</span>
		</label>

		<label class="input-group ">
			<input class="input" name="pregunta4">
			<span class="input__label">Talla de pantalón:</span>
		</label>

		<label class="input-group">
			<input class="input" name="pregunta5">
			<span class="input__label">Circunferencia de Brazo Izquierdo(mm):</span>
		</label>


		<label class="input-group">
			<input class="input" name="pregunta6">
			<span class="input__label">Clasificación Nutricional Antropometrica:</span>
		</label>
	</fieldset>

	<fieldset class="form__group form__group--padding-top">
		<legend class="form__group-legend">Datos académicos</legend>
		<label class="input-group">
			<input class="input" type="date" name="ingreso" required>
			<span class="input__label">Fecha de Ingreso:</span>
		</label>
		<label class="input-group">
			<span class="input__label">Estatus:</span>
			<div class="select-container">
				<select class="select" name="estatus" required>
					<option selected disabled>Seleccionar</option>
					<option value="activo">Activo</option>
					<option value="retirado">Retirado</option>
					<option value="suspendido">Suspendido</option>
					<option value="expulsado">Expulsado</option>
				</select>
			</div>
		</label>
		<label class="input-group">
			<span class="input__label">Programas Sociales:</span>
			<div class="select-container select-container--simple">
				<select class="select" name="programas_sociales" multiple>
					<option value="jgh">José Gregorio Hernández</option>
					<option value="escolaridad">Escolaridad (Patria)</option>
					<option value="ninguna">Ninguna</option>
				</select>
			</div>
		</label>
		<label class="input-group ">
			<textarea class="input" name="descripcion" required></textarea>
			<span class="input__label">Descripción:</span>
		</label>
	</fieldset>

	<button class="button button--half">Registrar</button>
</form>
