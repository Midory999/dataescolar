<?php

/** @var string $root */
/** @var string $assets */
/** @var App\Models\Representative[] $representatives */
?>

<form class="form" action="<?= $root ?>/estudiantes" method="post">
	<h2>Registro de estudiante</h2>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos personales</legend>
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

		<span class="input__label">Lugar de Nacimiento:</span>
		<label class="input-group input-group--animate">
			<input type="text" id="lugar_nacimiento" name="lugar_nacimiento" required>
		</label>

		<label for="edad">Edad:</label>
		<input type="number" id="edad" name="edad" required>

		<label for="tipo_parto">Tipo de Parto:</label>
		<select id="tipo_parto" name="tipo_parto" required>
			<option selected disabled>Seleccionar</option>
			<option value="normal">Normal</option>
			<option value="cesarea">Cesárea</option>
			<option value="complicado">Complicado</option>
		</select>

		<label for="compromiso">Compromiso:</label>
		<label id="compromiso">Selecciona las vacunas:</label>
		<select name="compromiso" id="compromiso" multiple>
			<option value="retardo_mental">Retardo Mental</option>
			<option value="sindrome_down">Síndrome de Down</option>
			<option value="autismo">Autismo</option>
		</select>

		<span class="input__label">Medicamentos:</span>
		<label class="input-group input-group--animate">
			<textarea id="medicamentos" name="medicamentos" required></textarea>
		</label>

		<label for="tipo_sangre">Tipo de Sangre:</label>
		<select id="tipo_sangre" name="tipo_sangre" required>
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

		<label for="genero">Género:</label>
		<select id="genero" name="genero" required>
			<option selected disabled>Seleccionar</option>
			<option value="masculino">Masculino</option>
			<option value="femenino">Femenino</option>
		</select>

		<label for="direccion">Dirección:</label>
		<textarea id="direccion" name="direccion" required></textarea>

		<label for="medidas">Medidas:</label>
		<label for="pregunta1">Peso Corporal(kg)</label>
		<input type="text" id="pregunta1" name="pregunta1"><br><br>

		<label for="pregunta2">Talla(cm)</label>
		<input type="text" id="pregunta2" name="pregunta2"><br><br>

		<label for="pregunta3">Talla de calzado</label>
		<input type="text" id="pregunta3" name="pregunta3"><br><br>

		<label for="pregunta4">Talla de pantalón</label>
		<input type="text" id="pregunta4" name="pregunta4"><br><br>

		<label for="pregunta5">Circunferencia de Brazo Izquierdo(mm)</label>
		<input type="text" id="pregunta5" name="pregunta5"><br><br>

		<label for="pregunta6">Clasificación Nutricional Antropometrica</label>
		<input type="text" id="pregunta6" name="pregunta6"><br><br>

		<label for="vacunas">Vacunas:</label>
		<label id="vacunas">Selecciona las vacunas:</label>
		<select name="vacunas" id="vacunas" multiple>
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
		<label for="programas_sociales">Programas Sociales:</label>
		<label id="programas_sociales">Selecciona los Programas Sociales que tengas:</label>
		<select name="programas_sociales" id="programas_sociales" multiple>
			<option value="jgh">José Gredorio Hernández</option>
			<option value="escolaridad">Escolaridad (Patria)</option>
			<option value="ninguna">Ninguna</option>

			<label for="ingreso">Fecha de Ingreso:</label>
			<input type="date" id="ingreso" name="ingreso" required>

			<label for="estatus">Estatus:</label>
			<select id="estatus" name="estatus" required>
				<option selected disabled>Seleccionar</option>
				<option value="activo">Activo</option>
				<option value="retirado">Retirado</option>
				<option value="suspendido">Suspendido</option>
				<option value="expulsado">Expulsado</option>
			</select>

			<label for="descripcion">Descripción:</label>
			<textarea id="descripcion" name="descripcion" required></textarea>

			<button>Registrar</button>
</form>