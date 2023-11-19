<?php

/** @var string $root */
/** @var string $assets */
/** @var App\Models\Representative[] $representatives */
?>

<form class="form" action="<?= $root ?>/estudiantes" method="post">
	<h2>Registro de estudiante</h2>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos personales</legend>
		<span class="input__label">Representante:</span>
		<div class="select-container">
			<select class="select" class="id_representante" id="id_representante">
				<option selected disabled>Seleccionar</option>
				<?php foreach ($representatives as $representative) echo <<<HTML
		<option value="{$representative->id}">
			{$representative->idCard} - {$representative->names}
		</option>
		HTML ?>
			</select>
		</div>
		</label>

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

		<label class="input-group input-group--animate">
			<input class="input" type="text" id="lugar_nacimiento" name="lugar_nacimiento" required>
			<span class="input__label">Lugar de Nacimiento:</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" type="number" id="edad" name="edad" required>
			<span class="input__label">Edad:</span>
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

	</fieldset>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos medico</legend>
		<label class="input-group">
			<span class="input__label">Vacunas:</span>
			<div class="select-container">
				<select class="select" id="tipo_parto" name="tipo_parto" required>
					<option value="normal">Normal</option>
					<option value="cesarea">Cesárea</option>
					<option value="complicado">Complicado</option>
				</select>
			</div>
		</label>

		<label class="input-group">
			<span class="input__label">Compromiso:</span>
			<div class="select-container">
				<select class="select" name="compromiso" id="compromiso" multiple>
					<option value="retardo_mental">Retardo Mental</option>
					<option value="sindrome_down">Síndrome de Down</option>
					<option value="autismo">Autismo</option>
				</select>
			</div>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" id="medicamentos" name="medicamentos" required></input>
			<span class="input__label">Medicamentos:</span>
		</label>

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

	<label for="direccion">Dirección:</label>
	<textarea id="direccion" name="direccion" required></textarea>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos Antropometrica</legend>
		<label class="input-group input-group--animate">
			<input class="input" type="text" id="pregunta1" name="pregunta1"><br><br>
			<span class="input__label">Peso Corporal(kg):</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" type="text" id="pregunta2" name="pregunta2"><br><br>
			<span class="input__label">Talla(cm):</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" type="text" id="pregunta3" name="pregunta3"><br><br>
			<span class="input__label">Talla de calzado:</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" type="text" id="pregunta4" name="pregunta4"><br><br>
			<span class="input__label">Talla de pantalón:</span>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" type="text" id="pregunta5" name="pregunta5"><br><br>
			<span class="input__label">Circunferencia de Brazo Izquierdo(mm):</span>
		</label>


		<label class="input-group input-group--animate">
			<input class="input" type="text" id="pregunta6" name="pregunta6"><br><br>
			<span class="input__label">Clasificación Nutricional Antropometrica:</span>
		</label>
	</fieldset>

	<fieldset class="form__group">
		<legend class="form__group-legend">Dato medico</legend>
		<label class="input-group">
			<span class="input__label">Vacunas:</span>
			<div class="select-container">
				<select class="select" name="vacunas" id="vacunas" multiple>
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
	</fieldset>

	<fieldset class="form__group">
		<legend class="form__group-legend">Dato academico</legend>
		<label class="input-group">
			<span class="input__label">Programas Sociales:</span>
			<div class="select-container">
				<select class="select" name="programas_sociales" id="programas_sociales" multiple>
					<option value="jgh">José Gredorio Hernández</option>
					<option value="escolaridad">Escolaridad (Patria)</option>
					<option value="ninguna">Ninguna</option>
				</select>
			</div>
		</label>

		<label class="input-group input-group--animate">
			<input class="input" type="date" id="ingreso" name="ingreso" required>
			<span class="input__label">Fecha de Ingreso:</span>
		</label>

		<label class="input-group">
			<span class="input__label">Estatus:</span>
			<div class="select-container">
				<select class="select" id="estatus" name="estatus" required>
					<option selected disabled>Seleccionar</option>
					<option value="activo">Activo</option>
					<option value="retirado">Retirado</option>
					<option value="suspendido">Suspendido</option>
					<option value="expulsado">Expulsado</option>
				</select>
			</div>
		</label>

		<label for="descripcion">Descripción:</label>
		<textarea id="descripcion" name="descripcion" required></textarea>

		<button>Registrar</button>
</form>