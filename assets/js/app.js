const $ = (selector = '') => document.querySelector(selector)

//////////////////////////
// Declarando variables //
//////////////////////////
const $loginForm = $('.formulario__login')
const $registerForm = $('.formulario__register')
const $loginFormRegister = $('.contenedor__login-register')
const $loginTriggerContainer = $('.caja__trasera-login')
const $registerTriggerContainer = $('.caja__trasera-register')

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
		$loginFormRegister.style.left = '0px'
		$registerForm.style.display = 'none'
	}
}

anchoPage()

function iniciarSesion() {
	if (window.innerWidth > 850) {
		$loginForm.style.display = 'block'
		$loginFormRegister.style.left = '10px'
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
		$loginFormRegister.style.left = '410px'
		$loginForm.style.display = 'none'
		$registerTriggerContainer.style.opacity = '0'
		$loginTriggerContainer.style.opacity = '1'
	} else {
		$registerForm.style.display = 'block'
		$loginFormRegister.style.left = '0px'
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
window.addEventListener('resize', anchoPage)
