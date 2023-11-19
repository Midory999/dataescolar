<?php

/** @var App\Models\Area $area */
/** @var string $root */
/** @var null|string $message */
?>

<section>
	<a href="<?= $root ?>/areas">Volver</a>
	<h2><?= $area->name ?></h2>
	<a href="<?= $area->getSlug() ?>/editar">Editar</a>
	<hr />
	<pre><?= json_encode($area->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?></pre>
</section>
