<main class="container">
	<div class="container__backdrop">
		<div class="container__backdrop--login">
			<h2>¿Ya tienes cuenta?</h2>
			<button
				class="button button--outline-white button--block"
				id="btn__iniciar-sesion">
				Iniciar Sesión
			</button>
		</div>
		<div class="container__backdrop--register">
			<h2>¿Aún no tienes cuenta?</h2>
			<button
				class="button button--outline-white button--block"
				id="btn__registrarse">
				Registrarse
			</button>
		</div>
	</div>
	<div class="forms">
		<form
			method="post"
			class="forms__form forms__form--login forms__form--active">
			<h2 class="forms__title">Iniciar Sesión</h2>
			<input
				type="number"
				name="cedula"
				placeholder="Cédula"
				required
				min="5000000"
				max="31000000"
				title="Introduce una cédula válida"
				class="forms__input"
			/>
			<input
				name="clave"
				type="password"
				placeholder="Contraseña"
				required minlength="8"
				title="La contraseña debe tener al menos 8 letras, 1 mayúscula, 1 símbolo y 1 número"
				class="forms__input"
			/>
			<button class="button button--primary button--block button--margin">
				Entrar
			</button>
		</form>
		<form
			action="./usuarios"
			method="post"
			class="forms__form forms__form--register">
			<h2 class="forms__title">Registrarse</h2>
			<input
				name="nombre"
				placeholder="Nombre"
				required
				minlength="3"
				maxlength="20"
				pattern="[A-Za-zÁáÉéÍíÓóÚúñÑ]{3,20}"
				title="Sólo se permiten entre 3 y 20 letras"
				class="forms__input"
			/>
			<input
				name="apellido"
				placeholder="Apellido"
				required
				minlength="3"
				maxlength="20"
				pattern="[A-Za-zÁáÉéÍíÓóÚúñÑ]{3,20}"
				title="Sólo se permiten entre 3 y 20 letras"
				class="forms__input"
			/>
			<input
				name="cedula"
				placeholder="Cédula"
				required
				pattern="[vVeE]-[0-9]{7,8}"
				title="Introduce una cédula válida (V-________ o E-________)"
				class="forms__input"
			/>
			<input
				name="clave"
				type="password"
				placeholder="Contraseña"
				required
				minlength="8"
				pattern="(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}"
				title="La contraseña debe tener al menos 8 letras, 1 mayúscula, 1 símbolo y 1 número"
				class="forms__input"
			/>
			<select name="pregunta" required class="forms__select">
				<option selected disabled>Pregunta de seguridad</option>
				<option>¿Postre favorito?</option>
				<option>¿Ciudad dónde se conocieron tus padres?</option>
				<option>¿Cual es el segundo apellido de tu madre?</option>
				<option>¿En dónde naciste?</option>
				<option>¿En qué colegio estudiaste la secundaria?</option>
				<option>¿Nombre de tu mejor amiga(o) de la escuela?</option>
				<option>¿Cual es el nombre de tu primera mascota?</option>
			</select>
			<input
				name="respuesta"
				type="password"
				placeholder="Respuesta de seguridad"
				required
				pattern="[A-Za-zÁáÉéÍíÓóÚúñÑ ]{2,20}"
				title="Sólo se permiten entre 2 y 20 letras"
				class="forms__input"
			/>
			<button class="button button--primary button--block button--margin">
				Registrarse
			</button>
		</form>
	</div>
</main>

<script>
	const $ = (selector = '') => document.querySelector(selector)

	//////////////////////////
	// Declarando variables //
	//////////////////////////
	const $loginForm = $('.forms__form--login')
	const $registerForm = $('.forms__form--register')
	const $loginFormRegister = $('.forms')
	const $loginTriggerContainer = $('.container__backdrop--login')
	const $registerTriggerContainer = $('.container__backdrop--register')

	///////////////
	// FUNCIONES //
	///////////////
	function anchoPage() {
		if (window.innerWidth > 850) {
			$registerTriggerContainer.style.display = 'block'
			$loginTriggerContainer.style.display = 'block'
		} else {
			$registerTriggerContainer.style.display = 'block'
			$registerTriggerContainer.style.opacity = '1'
			$loginTriggerContainer.style.display = 'none'
			$loginForm.style.display = 'block'
			$loginFormRegister.style.transform = 'translate(3%, -25vh)'
			$registerForm.style.display = 'none'
		}
	}

	anchoPage()

	function iniciarSesion() {
		if (window.innerWidth > 850) {
			$loginForm.style.display = 'block'
			$loginFormRegister.style.transform = 'translate(3%, -25vh)'
			$registerForm.style.display = 'none'
			$registerTriggerContainer.style.opacity = '1'
			$loginTriggerContainer.style.opacity = '0'
		} else {
			$loginForm.style.display = 'block'
			$loginFormRegister.style.left = '0px'
			$registerForm.style.display = 'none'
			$registerTriggerContainer.style.display = 'block'
			$loginTriggerContainer.style.display = 'none'
		}
	}

	function register() {
		if (window.innerWidth > 850) {
			$registerForm.style.display = 'block'
			$loginFormRegister.style.transform = 'translate(97%, -25vh)'
			$loginForm.style.display = 'none'
			$registerTriggerContainer.style.opacity = '0'
			$loginTriggerContainer.style.opacity = '1'
		} else {
			$registerForm.style.display = 'block'
			$loginFormRegister.style.transform = 'translate(3%, -25vh)'
			$loginForm.style.display = 'none'
			$registerTriggerContainer.style.display = 'none'
			$loginTriggerContainer.style.display = 'block'
			$loginTriggerContainer.style.opacity = '1'
		}
	}

	//////////////////////////
	// Ejecutando funciones //
	//////////////////////////
	$('#btn__iniciar-sesion').addEventListener('click', iniciarSesion)
	$('#btn__registrarse').addEventListener('click', register)
	addEventListener('resize', anchoPage)
</script>
