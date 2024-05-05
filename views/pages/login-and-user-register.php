<?php

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
				<input type="number" name="cedula" placeholder="Cédula" required min="1" title="Introduce una cédula válida" />
				<input name="clave" type="password" placeholder="Contraseña" required minlength="8" title="La contraseña debe tener al menos 8 letras, números y símbolos" />
				<button>Entrar</button>
			</form>
			<!-- registro -->
			<form action="<?= $root ?>/usuarios" method="POST" class="formulario__register">
				<h2>Registrarse</h2>
				<input name="nombre" placeholder="Nombre" required minlength="3" maxlength="20" pattern="[A-Za-zÁáÉéÍíÓóÚúñÑ]{3,20}" title="Sólo se permiten entre 3 y 20 letras" />
				<input name="apellido" placeholder="Apellido" required minlength="3" maxlength="20" pattern="[A-Za-zÁáÉéÍíÓóÚúñÑ]{3,20}" title="Sólo se permiten entre 3 y 20 letras" />
				<input type="number" name="cedula" placeholder="Cédula" required min="1" title="Introduce una cédula válida" />
				<input name="clave" type="password" placeholder="Contraseña" required minlength="8" title="La contraseña debe tener al menos 8 letras, números y símbolos" />
				<hr />
				<select name="pregunta">
					<option selected disabled>Pregunta de seguridad</option>
					<option>¿Postre favorito?</option>
					<option>¿Ciudad dónde se conocieron tus padres?</option>
					<option>¿Cual es el segundo apellido de tu madre?</option>
					<option>¿En dónde naciste?</option>
					<option>¿En qué colegio estudiaste la secundaria?</option>
					<option>¿Nombre de tu mejor amiga(o) de la escuela?</option>
					<option>¿Cual es el nombre de tu primera mascota?</option>
				</select>
				<input name="respuesta" type="password" placeholder="Respuesta de seguridad" required pattern="[A-Za-zÁáÉéÍíÓóÚúñÑ]{2,20}" title="Sólo se permiten entre 2 y 20 letras" />
				<button>Registrarse</button>
			</form>
		</div>
	</div>
</main>

<script>
	const regexps = {
		idCard: /^[0-9]{1,8}$/
	}

	{
		const $loginForm = document.querySelector('.formulario__login')
		const $idCard = $loginForm.querySelector('[name="cedula"]')

		$loginForm.onsubmit = (event) => {
			if (!regexps.idCard.test($idCard.value)) {
				event.preventDefault()
				alert($idCard.getAttribute('title'))
			}
		}
	}

	{
		const $registerForm = document.querySelector('.formulario__login')
		const $idCard = $registerForm.querySelector('[name="cedula"]')

		$registerForm.onsubmit = (event) => {
			if (!regexps.idCard.test($idCard.value)) {
				event.preventDefault()
				alert($idCard.getAttribute('title'))
			}
		}
	}
</script>

<?php if ($error !== null) echo <<<HTML
	<script>
		Swal.fire({
			title: '$error',
			footer: 'Por favor, inténtelo de nuevo',
			icon: 'error',
			toast: true,
			position: 'top-right',
			showConfirmButton: false,
			timer: 5000,
			timerProgressBar: true
		})
	</script>
HTML ?>
