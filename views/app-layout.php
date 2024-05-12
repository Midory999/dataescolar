<?php

use App\Core\Session;
use App\Models\School;

/** @var string $content */
/** @var School $school */

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title><?= $title ?> - DataEscolar</title>
	<base href="<?= str_replace('index.php', '', $_SERVER['SCRIPT_NAME']) ?>" />
	<link rel="icon" href="./assets/images/favicon.png" />
	<link rel="stylesheet" href="./assets/libs/w3css/w3.css" />
	<link rel="stylesheet" href="./assets/libs/sweetalert2/material-ui.css" />
	<link rel="stylesheet" href="./assets/libs/pushbar/pushbar.css" />
	<link rel="stylesheet" href="./assets/css/dataescolar.css" />
	<script src="./assets/libs/html2pdf/html2pdf.bundle.min.js"></script>
	<script src="./assets/libs/html2pdf/pdf.js"></script>
	<style>
		.swal2-shown.swal2-height-auto {
			padding-right: 0 !important;
		}

		.w3-button {
			transition: 250ms all;
		}
	</style>
</head>

<body>
	<div class="app">
		<?php include __DIR__ . '/components/header.php' ?>
		<main class="main">
			<?= $content ?>
			<?php include __DIR__ . '/components/sidebar.php' ?>
		</main>
		<footer class="footer" data-pushbar-target="authors">
			<div>&copy; UPTM &hearts; - Yasmin Gallo & José Mendoza</div>
			<?php include __DIR__ . '/components/about.php' ?>
			<?php include __DIR__ . '/components/authors.php' ?>
		</footer>
	</div>
	<script src="./assets/libs/sweetalert2/sweetalert2.min.js"></script>
	<script src="./assets/libs/pushbar/pushbar.js"></script>
	<script>
		new Pushbar({
			blur: true,
			overlay: true
		})
	</script>
	<?php if (Session::has('error')): ?>
		<script>
			Swal.fire({
				title: `<?= Session::getAndDelete('error') ?>`,
				footer: 'Por favor, inténtelo de nuevo',
				icon: 'error',
				toast: true,
				position: 'top-right',
				showConfirmButton: false,
				timer: 5000,
				timerProgressBar: true
			})
		</script>
	<?php elseif (Session::has('success')): ?>
		<script>
			Swal.fire({
				title: `<?= Session::getAndDelete('success') ?>`,
				icon: 'success',
				toast: true,
				position: 'top-right',
				showConfirmButton: false,
				timer: 5000,
				timerProgressBar: true
			})
		</script>
	<?php endif ?>
</body>

</html>
