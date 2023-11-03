<?php
	use App\Models\Period;
	use App\Models\User;

	/** @var string $assets */
	/** @var string $content */
	/** @var User $user */
	/** @var ?Period $currentPeriod */
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Sistema Escolar</title>
		<link rel="icon" href="<?= $assets ?>/images/favicon.png" />
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css"
		/>
		<style>
			.navLink:hover {
				text-decoration: none;
			}

			select {
				appearance: none;
				-moz-appearance: none;
			}

			input[type="number"] {
				appearance: textfield;
				-moz-appearance: textfield;
			}
		</style>
	</head>

	<body>
		<header>
			<nav>
				<a class="navLink" href="<?= $root ?>">
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
				<?php if ($user->isAdmin()): ?>
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
			<hr />
			<h1>Bienvenido <?= $user->name ?></h1>
			<h2>
				Periodo actual:
				<?= $currentPeriod ?? '<strong>No establecido</strong>' ?>
			</h2>
		</header>
		<hr />
		<main><?= $content ?></main>
		<hr />
	</body>

</html>
