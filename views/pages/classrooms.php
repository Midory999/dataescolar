<?php

use App\Models\Classroom;
use App\Models\Teacher;

/** @var Classroom[] $classrooms */
/** @var string $root */
/** @var null|string $message */

$teacher = new Teacher;
$teacher->names = 'John Doe';
$classroom1 = new Classroom('Aula 1', $teacher);
$classroom1->setID(1);
$classroom2 = new Classroom('Aula 2', $teacher);
$classroom2->setID(2);
$classroom3 = new Classroom('Aula 3', $teacher);
$classroom3->setID(3);

$classrooms = [$classroom1, $classroom2, $classroom3];
?>

<section class="w3-section">
	<h2>Aula</h2>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/aulas/registrar">Añadir</a>
	<div class="cards cards--2col w3-section">
		<?php foreach ($classrooms as $classroom) echo <<<HTML
			<a href="$root/aulas/{$classroom->getID()}" class="card w3-border">
				<h3 class="w3-center">{$classroom->name}</h3>
				<ul class="w3-ul">
					<li class="w3-row-padding">
						<div class="w3-third w3-container">
							<span class="w3-tag w3-pink">Profesor</span>
						</div>
						<div class="w3-rest w3-container">
							<span>{$classroom->teacher->names}</span>
						</div>
					</li>
				</ul>
			</a>
		HTML ?>
	</div>
</section>
