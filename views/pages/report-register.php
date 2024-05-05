<?php

/** @var string $root */
/** @var App\Models\Area[] $areas */
/** @var App\Models\Level[] $levels */
?>

<form class="form" action="<?= $root ?>/informes" method="post">
	<h2>Registro de informe</h2>

	<div class="form__group">
		<label class="input-group ">
			<input class="input" type="number" name="id" required>
			<span class="input__label">ID:</span>
		</label>
		<label class="input-group ">
			<textarea class="input" name="diagnostico" required></textarea>
			<span class="input__label">Diagnóstico:</span>
		</label>
	</div>
	<fieldset class="form__group">
		<legend class="form__group-legend">Lapsos</legend>
		<label class="input-group ">
			<input name="lapso1" class="input" required />
			<span class="input__label">Lapso 1:</span>
		</label>
		<label class="input-group ">
			<input name="lapso2" class="input" required />
			<span class="input__label">Lapso 2:</span>
		</label>
		<label class="input-group ">
			<input name="lapso3" class="input" required />
			<span class="input__label">Lapso 3:</span>
		</label>
	</fieldset>
	<fieldset class="form__group form__group--padding-top">
		<label class="input-group">
			<span class="input__label">Estudiante:</span>
			<div class="select-container">
				<select class="select" name="id_estudiante" required>
					<option selected disabled>Seleccionar</option>
					<?php foreach ($students as $student) echo <<<HTML
						<option value="{$student->id}">
							{$student->names} {$student->lastnames}
						</option>
					HTML ?>
				</select>
			</div>
		</label>
		<label class="input-group">
			<span class="input__label">Profesor:</span>
			<div class="select-container">
				<select class="select" name="id_profesor" required>
					<option selected disabled>Seleccionar</option>
					<?php foreach ($teachers as $teacher) echo <<<HTML
						<option value="{$teacher->id}">
							{$teacher->names} {$teacher->lastnames}
						</option>
					HTML ?>
				</select>
			</div>
		</label>
		<label class="input-group">
			<span class="input__label">Área:</span>
			<div class="select-container">
				<select class="select" name="codigo_area" required>
					<option selected disabled>Seleccionar</option>
					<?php foreach ($areas as $area) echo <<<HTML
						<option value="{$area->getCode()}">
							{$area->name}
						</option>
					HTML ?>
				</select>
			</div>
		</label>
		<label class="input-group">
			<span class="input__label">Nivel:</span>
			<div class="select-container">
				<select class="select" name="id_nivel" required>
					<option selected disabled>Seleccionar</option>
					<?php foreach ($levels as $level) echo <<<HTML
						<option value="{$level->id}">
							{$level->id} - {$level->code}
						</option>
					HTML ?>
				</select>
			</div>
		</label>
	</fieldset>
	<label class="input-group ">
		<textarea class="input" name="informe_final" required></textarea>
		<span class="input__label">Informe final:</span>
	</label>
	<button class="button button--half">Registrar</button>
</form>
