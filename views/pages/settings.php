<?php
	/** @var string $root */
	/** @var ?string $error */
?>

<h2>Configuraciones</h2>

<h3>Respaldo y Restauración</h3>
<a class="navLink" href="<?= $root ?>/configuracion/respaldar">
	<button>Respaldar</button>
</a>
<a class="navLink" href="<?= $root ?>/configuracion/restaurar">
	<button>Restaurar</button>
</a>

<?php if ($error) echo <<<HTML
	<script>alert('$error')</script>
HTML ?>
