<?php
	use App\Models\User;
	/** @var string $root */
	/** @var User $user */
?>

<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css"
/>

<h1>Bienvenido <?= $user->name ?></h1>
<a href="<?= $root ?>/salir">Cerrar Sesión</a>
