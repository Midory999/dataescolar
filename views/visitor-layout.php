<?php

/** @var string $assets */
/** @var string $content */
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Sistema Escolar</title>
	<link rel="icon" href="<?= $assets ?>/images/favicon.png" />
	<link rel="stylesheet" href="<?= $assets ?>/libs/sweetalert2/material-ui.css" />
	<link rel="stylesheet" href="<?= $assets ?>/css/app.css" />
	<script src="<?= $assets ?>/libs/sweetalert2/sweetalert2.min.js"></script>
	<style>
		input[type="number"] {
			appearance: textfield;
			-moz-appearance: textfield;
		}
	</style>
</head>

<body>
	<?= $content ?>
	<script src="<?= $assets ?>/js/app.js"></script>
</body>

</html>
