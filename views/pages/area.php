<?php

/** @var App\Models\Area $area */
/** @var string $root */
/** @var null|string $message */
?>

<section class="w3-section">
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/areas">Volver</a>
	<h2><?= $area->name ?></h2>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root . '/areas/' . $area->getCode() ?>/editar">
		Editar
	</a>
	<hr />
	<ul class="w3-ul">
		<li class="w3-row">
			<strong class="w3-third">Código:</strong>
			<span class="w3-rest"><?= $area->getCode() ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Nombre:</strong>
			<span class="w3-rest"><?= $area->name ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Profesor asignado:</strong>
			<a href="<?= $root ?>/profesores/<?= $area->getTeacher()?->id ?>" class="w3-rest"><?= $area->getTeacher() ?></a>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Aula asignada:</strong>
			<a href="<?= $root ?>/aulas/<?= $area->getClassroom()?->getID() ?>" class="w3-rest">
				<?= $area->getClassroom() ?>
			</a>
		</li>
	</ul>
</section>
