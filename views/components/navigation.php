<?php
/** @var string $root */
/** @var App\Models\User $user */
?>

<nav class="nav">
	<a class="nav__link" href="<?= $root ?>/">Inicio</a>
	<button class="nav__link" data-pushbar-target="sidebar">
		<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 28">
			<path d="M24 21v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1zM24 13v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1zM24 5v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1z"></path>
		</svg>
	</button>
	<a class="nav__link" href="<?= $root ?>/salir">Cerrar Sesión</a>
</nav>
