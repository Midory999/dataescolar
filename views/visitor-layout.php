<?php

use App\Core\Session;

/** @var string $content */

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<base href="<?= str_replace('index.php', '', $_SERVER['SCRIPT_NAME']) ?>" />
	<title>Sistema Escolar</title>
	<link rel="icon" href="./assets/images/favicon.png" />
	<link rel="stylesheet" href="./assets/libs/sweetalert2/material-ui.css" />
	<link rel="stylesheet" href="./assets/css/app.css" />
</head>

<body>
	<?= $content ?>
	<script src="./assets/libs/sweetalert2/sweetalert2.min.js"></script>
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
