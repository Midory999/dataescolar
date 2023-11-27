<?php

/** @var string $root */
/** @var App\Models\Student[] $students */
/** @var App\Models\Level[] $levels */
/** @var App\Models\Period[] $periods */
?>

<style>
	.input.w3-button {
		transition: 250ms all;
	}
</style>

<form class="form" action="<?= $root ?>/inscripciones" method="post">
	<h2>Inscribir estudiante</h2>

	<fieldset class="form__group form__group--padding-top">
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
			<span class="input__label">&nbsp;</span>
			<a class="input w3-button w3-pale-red w3-hover-white" href="<?= $root ?>/estudiantes/registrar">Registrar</a>
		</label>
	</fieldset>

	<fieldset class="form__group form__group--padding-top">
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
			<span class="input__label">&nbsp;</span>
			<a class="input w3-button w3-pale-red w3-hover-white" href="<?= $root ?>/niveles/registrar">Registrar</a>
		</label>
	</fieldset>
	<fieldset class="form__group form__group--padding-top">
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
		<label class="input-group">
			<span class="input__label">&nbsp;</span>
			<a class="input w3-button w3-pale-red w3-hover-white" href="<?= $root ?>/periodos/registrar">Registrar</a>
		</label>
	</fieldset>
	<button class="button button--half">Registrar</button>
</form>
