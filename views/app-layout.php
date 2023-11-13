<?php
/** @var string $assets */
/** @var string $content */

function getWeekDay() {
	$days = [1 => 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

	return $days[date('w')];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Sistema Escolar</title>
	<link rel="icon" href="<?= $assets ?>/images/favicon.png" />
	<link rel="stylesheet" href="<?= $assets ?>/css/dataescolar.css" />
	<!-- <link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css"
		/> -->
	<style>
		.navLink:hover {
			text-decoration: none;
		}

		select {
			appearance: none;
			-moz-appearance: none;
		}

		input[type='number'] {
			appearance: textfield;
			-moz-appearance: textfield;
		}

		[src$='.png'] {
			min-height: 155px;
		}
	</style>
</head>

<body>
	<header class="header">
		<a href="#" class="about-button animated--zoom">
			<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 17 28">
				<path d="M11 19.625v3.75c0 0.344-0.281 0.625-0.625 0.625h-3.75c-0.344 0-0.625-0.281-0.625-0.625v-3.75c0-0.344 0.281-0.625 0.625-0.625h3.75c0.344 0 0.625 0.281 0.625 0.625zM15.937 10.25c0 2.969-2.016 4.109-3.5 4.937-0.922 0.531-1.5 1.609-1.5 2.063v0c0 0.344-0.266 0.75-0.625 0.75h-3.75c-0.344 0-0.562-0.531-0.562-0.875v-0.703c0-1.891 1.875-3.516 3.25-4.141 1.203-0.547 1.703-1.062 1.703-2.063 0-0.875-1.141-1.656-2.406-1.656-0.703 0-1.344 0.219-1.687 0.453-0.375 0.266-0.75 0.641-1.672 1.797-0.125 0.156-0.313 0.25-0.484 0.25-0.141 0-0.266-0.047-0.391-0.125l-2.562-1.953c-0.266-0.203-0.328-0.547-0.156-0.828 1.687-2.797 4.062-4.156 7.25-4.156 3.344 0 7.094 2.672 7.094 6.25z"></path>
			</svg>
		</a>
		<h1>Escuela</h1>
		<nav class="nav">
			<hr class="nav__border" />
		</nav>
	</header>
	<main class="main">
		<a href="#" class="card">
			<div class="card__image clock">
				<span class="clock__time">
					<?= date('h') ?>
					:
					<?= date('i') ?>
				</span>
				<span class="clock__day"><?= getWeekDay() ?> <?= date('d') ?></span>
			</div>
		</a>
		<a href="#" class="card">
			<img class="card__image animated--zoom" src="<?= $assets ?>/images/card6.png" />
		</a>
		<a href="#" class="card">
			<img class="card__image animated--zoom" src="<?= $assets ?>/images/card6.png" />
		</a>
		<article class="card card--2y">
			<img class="card__image animated--zoom" src="<?= $assets ?>/images/card5.png" />
			<form action="#" class="checkboxes">
				<label>
					<input type="checkbox" checked />
					<span class="checkbox__icon"></span>
					Tarea 1
				</label>
				<label>
					<input type="checkbox" />
					<span class="checkbox__icon"></span>
					Tarea 2
				</label>
				<label>
					<input type="checkbox" />
					<span class="checkbox__icon"></span>
					Tarea 2
				</label>
				<label>
					<input type="checkbox" />
					<span class="checkbox__icon"></span>
					...
				</label>
				<label>
					<input type="checkbox" />
					<span class="checkbox__icon"></span>
					Tarea n
				</label>
			</form>
		</article>
		<div class="cards">
			<a href="#" class="card">
				<figure>
					<img class="card__image animated--zoom" src="<?= $assets ?>/images/card1.png" />
					<figcaption>
						<img src="<?= $assets ?>/images/flower3.png" />
						Calentario
					</figcaption>
				</figure>
			</a>
			<a href="#" class="card">
				<figure>
					<img class="card__image animated--zoom" src="<?= $assets ?>/images/card2.png" />
					<figcaption>
						<img src="<?= $assets ?>/images/flower3.png" />
						Materias
					</figcaption>
				</figure>
			</a>
			<a href="#" class="card">
				<figure>
					<img class="card__image animated--zoom" src="<?= $assets ?>/images/card3.png" />
					<figcaption>
						<img src="<?= $assets ?>/images/flower3.png" />
						Gastos
					</figcaption>
				</figure>
			</a>
			<a href="#" class="card">
				<figure>
					<img class="card__image animated--zoom" src="<?= $assets ?>/images/card4.png" />
					<figcaption>
						<img src="<?= $assets ?>/images/flower3.png" />
						Plan para exámenes
					</figcaption>
				</figure>
			</a>
		</div>
	</main>
	<footer class="footer">
		&copy; UPTM &hearts; - Yasmin Gallo & José Mendoza
	</footer>
	<?php # include __DIR__ . '/components/header.php'
	?>
	<!-- <main><?= $content ?></main> -->
</body>

</html>
