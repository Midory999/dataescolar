<?php
	/** @var string $root */
?>

<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css"
/>

<form action="<?= $root ?>/periodos" method="post">
	<h1>Registro de periodo</h1>
	<label for="inicio">Año de Inicio</label>
	<input
		type="number"
		name="inicio"
		id="inicio"
		required
		min="1970"
		max="<?= date('Y') + 1 ?>"
	/>
	<button>Registrar</button>
</form>
