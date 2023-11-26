<?php

/** @var string $root */
/** @var ?string $error */
/** @var bool $thereIsBackup */
?>

<section class="w3-section">
	<h2>Configuraciones</h2>
	<hr />
	<h3>Respaldo y Restauración</h3>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/configuracion/respaldar">Respaldar</a>
	<?php if ($thereIsBackup) : ?>
		<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/configuracion/restaurar">Restaurar</a>
	<?php endif ?>
	<hr />

	<?php if ($error) echo <<<HTML
		<script>alert('$error')</script>
	HTML ?>
</section>
