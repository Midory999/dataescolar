<?php

use App\Models\Teacher;

assert($teacher instanceof Teacher);
assert(is_string($root));

?>

<section class="w3-section">
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/aulas">
		Volver
	</a>
	<h2><?= $teacher ?></h2>
	<ul class="w3-ul">
		<li class="w3-row">
			<strong class="w3-third">ID:</strong>
			<span class="w3-rest"><?= $teacher->getID() ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Nombre completo:</strong>
			<span class="w3-rest"><?= $teacher ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Cédula:</strong>
			<span class="w3-rest"><?= $teacher->idCard ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Estado:</strong>
			<span class="w3-rest"><?= $teacher->status ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Especialidad:</strong>
			<span class="w3-rest"><?= $teacher->specialty ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Dirección:</strong>
			<span class="w3-rest"><?= $teacher->direction ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Correo:</strong>
			<span class="w3-rest"><?= $teacher->email ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Teléfono:</strong>
			<span class="w3-rest"><?= $teacher->phone ?></span>
		</li>
		<li class="w3-row">
			<strong class="w3-third">Edad:</strong>
			<span class="w3-rest"><?= $teacher->age ?></span>
		</li>
	</ul>
</section>
