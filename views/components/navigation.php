<?php
/** @var string $root */
/** @var App\Models\User $user */
?>

<nav>
	<a class="navLink" href="<?= $root ?>/">
		<button>Inicio</button>
	</a>
	<a class="navLink" href="<?= $root ?>/representantes">
		<button>Ver representantes</button>
	</a>
	<a class="navLink" href="<?= $root ?>/estudiantes">
		<button>Ver estudiantes</button>
	</a>

	<!--========================================
	=            ENLACES PROTEGIDOS            =
	=========================================-->
	<?php if ($user->isAdmin()) : ?>
		<a class="navLink" href="<?= $root ?>/representantes/registrar">
			<button>Registrar representante</button>
		</a>
		<a class="navLink" href="<?= $root ?>/estudiantes/registrar">
			<button>Registrar estudiante</button>
		</a>
		<a class="navLink" href="<?= $root ?>/usuarios">
			<button>Ver usuarios</button>
		</a>
		<a class="navLink" href="<?= $root ?>/periodos">
			<button>Ver periodos</button>
		</a>
		<a class="navLink" href="<?= $root ?>/periodos/registrar">
			<button>Registrar periodo</button>
		</a>
		<a class="navLink" href="<?= $root ?>/configuracion">
			<button>Configuración</button>
		</a>
	<?php endif ?>
	<!--====  End of ENLACES PROTEGIDOS  ====-->
	<a class="navLink" href="<?= $root ?>/salir">
		<button>Cerrar Sesión</button>
	</a>
</nav>
