<?php

use App\Models\Classroom;

assert(is_string($root));

/** @var Classroom[] $classrooms */

?>

<section class="w3-section">
	<h2>Aulas</h2>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/aulas/registrar">
		Añadir
	</a>
	<div class="cards cards--2col w3-section">
		<?php foreach ($classrooms as $classroom) echo <<<HTML
			<a href="$root/aulas/{$classroom->getID()}" class="card w3-border">
				<h3 class="w3-center">{$classroom->name}</h3>
				<ul class="w3-ul">
					<li class="w3-row-padding">
						<div class="w3-third w3-container">
							<span class="w3-tag w3-pink">Profesor asignado:</span>
						</div>
						<div class="w3-rest w3-container">
							<span>{$classroom->teacher}</span>
						</div>
					</li>
				</ul>
			</a>
		HTML ?>
	</div>
</section>
