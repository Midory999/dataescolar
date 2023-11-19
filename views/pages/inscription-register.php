<?php

/** @var string $root */
/** @var App\Models\Student[] $students */
/** @var App\Models\Level[] $levels */
/** @var App\Models\Period[] $periods */
?>

<form class="form" action="<?= $root ?>/inscripciones" method="post">
	<h2>Inscribir estudiante</h2>

	<label class="input-group">
		<span class="input__label">Estudiante:</span>
		<div class="select-container">
			<select class="select" name="cedula_estudiante">
				<option selected disabled>Seleccionar</option>
				<?php foreach ($students as $student) echo <<<HTML
				<option value="{$student->idCard}">
					{$student->idCard} - {$student->names}
				</option>
				HTML ?>
			</select>
		</div>
	</label>

	<label class="input-group">
		<span class="input__label">Nivel:</span>
		<div class="select-container">
			<select class="select" name="id_niveles">
				<option selected disabled>Seleccionar</option>
				<?php foreach ($levels as $level) echo <<<HTML
				<option value="{$level->id}">
					{$level->id} - {$level->code}
				</option>
				HTML ?>
			</select>
		</div>
	</label>

	<label class="input-group">
		<span class="input__label">Periodo:</span>
		<div class="select-container">
			<select class="select" name="id_periodo">
				<option selected disabled>Seleccionar</option>
				<?php foreach ($periods as $period) echo <<<HTML
				<option value="{$period->getID()}">{$period}</option>
				HTML ?>
			</select>
		</div>
	</label>

	<button class="button button--half">Registrar</button>
</form>