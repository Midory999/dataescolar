<?php
	/** @var \App\Models\Role[] $roles */
	/** @var string $root */
	/** @var ?string $error */
?>

<main>
	<div class="contenedor__todo">
		<div class="caja__trasera">
			<div class="caja__trasera-login">
				<h3>¿Ya tienes cuenta?</h3>
				<p>Inicia sesión para entrar en la página</p>
				<button id="btn__iniciar-sesion">Iniciar Sesión</button>
			</div>
			<div class="caja__trasera-register">
				<h3>¿Aún no tienes cuenta?</h3>
				<p>Regístrate para que puedas iniciar sesión</p>
				<button id="btn__registrarse">Registrarse</button>
			</div>
		</div>
		<!--Formulario de login y Registro-->
		<div class="contenedor__login-register">
			<!-- login -->
			<form method="post" class="formulario__login">
				<h2>Iniciar Sesión</h2>
				<input name="cedula" placeholder="Cédula" />
				<input name="clave" type="password" placeholder="Contraseña" />
				<button>Entrar</button>
			</form>
			<!-- registro -->
			<form action="<?= $root ?>/usuarios" method="POST" class="formulario__register">
				<h2>Registrarse</h2>
				<input name="nombre" placeholder="Nombre" />
				<input name="apellido" placeholder="Apellido" />
				<input name="cedula" placeholder="Cédula" />
				<input name="clave" type="password" placeholder="Contraseña" />
				<select name="rol">
					<option selected disabled>Seleccione un rol</option>
					<?php foreach ($roles as $rol) echo <<<HTML
						<option value="$rol->value">$rol->value/a</option>
					HTML ?>
				</select>
				<hr />
				<input name="pregunta" type="password" placeholder="Pregunta de seguridad" />
				<input name="respuesta" type="password" placeholder="Respuesta de seguridad" />
				<button>Registrarse</button>
			</form>
		</div>
	</div>
</main>

<?php if ($error) echo <<<HTML
	<script>alert('$error')</script>
HTML ?>
