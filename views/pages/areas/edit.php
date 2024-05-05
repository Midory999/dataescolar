<?php

use App\Models\Area;
use App\Models\Classroom;
use App\Models\Teacher;

/** @var string $root */
/** @var string $assets */
/** @var Area $area */
/** @var Teacher[] $teachers */
/** @var Classroom[] $classrooms */

?>

<form class="form" action="<?= $root ?>/areas/<?= $area->getSlug() ?>" method="post">
	<h2>Editar Área</h2>
	<div class="form__group">
		<label class="input-group">
			<input class="input" type="number" disabled readonly name="codigo" value="<?= $area->getCode() ?>" min="1" required />
			<span class="input__label">Código:</span>
		</label>
		<label class="input-group">
			<input class="input" name="nombre" required value="<?= $area->name ?>" />
			<span class="input__label">Nombre:</span>
		</label>
		<label class="input-group">
			<span class="input__label">Asignar profesor:</span>
			<div class="select-container">
				<select class="select" name="id_profesor">
					<option selected disabled>Seleccionar</option>
					<?php foreach ($teachers as $teacher) echo <<<HTML
					<option value="{$teacher->id}">
						CI. {$teacher->idCard}
						- $teacher
					</option>
					HTML ?>
				</select>
			</div>
		</label>
		<label class="input-group">
			<span class="input__label">Asignar aula:</span>
			<div class="select-container">
				<select class="select" name="id_aula">
					<option selected disabled>Seleccionar</option>
					<?php foreach ($classrooms as $classroom) echo <<<HTML
					<option value="{$classroom->getID()}">
						$classroom
					</option>
					HTML ?>
				</select>
			</div>
		</label>
	</div>
	<button class="button button--half">Actualizar</button>
</form>
