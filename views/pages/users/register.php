<?php

assert(is_string($root));
assert(is_string($assets));

?>

<form class="form" action="<?= $root ?>/usuarios" method="post">
	<h2>Registro de Usuario</h2>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos personales</legend>
		<label class="input-group ">
			<input class="input" type="number" name="cedula" required />
			<span class="input__label">Cédula:</span>
		</label>

		<label class="input-group ">
			<input class="input" name="nombre" required />
			<span class="input__label">Nombre:</span>
		</label>

		<label class="input-group ">
			<input class="input" name="apellido" required />
			<span class="input__label">Apellido:</span>
		</label>
	</fieldset>

	<fieldset class="form__group">
		<legend class="form__group-legend">Seguridad</legend>
		<label class="input-group ">
			<input class="input" type="password" name="clave" required />
			<span class="input__label">Contraseña:</span>
		</label>
		<label class="input-group">
			<span class="input__label">Rol:</span>
			<div class="select-container">
				<select class="select" name="rol" required>
					<option selected disabled>Seleccionar</option>
					<option>Secretario</option>
					<option>Profesor</option>
				</select>
			</div>
		</label>
		<label class="input-group">
			<span class="input__label">Pregunta de seguridad:</span>
			<div class="select-container">
				<select class="select" name="pregunta" required>
					<option selected disabled>Seleccionar</option>
					<option>¿Postre favorito?</option>
					<option>¿Ciudad dónde se conocieron tus padres?</option>
					<option>¿Cuál es el segundo apellido de tu madre?</option>
					<option>¿En dónde naciste?</option>
					<option>¿En qué colegio estudiaste la secundaria?</option>
					<option>¿Nombre de tu mejor amiga(o) de la escuela?</option>
					<option>¿Cuál es el nombre de tu primera mascota?</option>
				</select>
			</div>
		</label>
		<label class="input-group ">
			<input class="input" type="password" name="respuesta" required />
			<span class="input__label">Respuesta de seguridad:</span>
		</label>
	</fieldset>
	<button class="button button--half">Registrar</button>
</form>
