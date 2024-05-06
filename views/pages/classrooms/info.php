<?php

use App\Models\Classroom;

assert($classroom instanceof Classroom);
assert(is_string($root));

?>

<section class="w3-section">
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/aulas">Volver</a>
	<h2><?= $classroom ?></h2>
	<ul class="w3-ul">
		<li class="w3-row">
			<strong class="w3-third">ID:</strong>
			<span class="w3-rest"><?= $classroom->getID() ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Nombre:</strong>
			<span class="w3-rest"><?= $classroom->name ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Profesor asignado:</strong>
			<a href="<?= $root ?>/profesores/<?= $classroom->teacher?->id ?>" class="w3-rest">
				> <?= $classroom->teacher ?>
			</a>
		</li>
	</ul>
</section>
