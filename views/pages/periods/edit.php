<?php

use App\Models\Period;

/** @var string $root */
/** @var Period $period */

?>

<form class="form" action="./periodos/<?= $period->getID() ?>" method="post">
	<h2>Editar Periodo</h2>

	<label class="input-group">
		<input onchange="setYear(this)" class="input" type="year" name="inicio" required min="1970" max="<?= date('Y') ?>" value="<?= $period->startYear ?>" />
		<span class="input__label">Año de inicio:</span>
	</label>

	<fieldset class="form__group">
		<legend class="form__group-legend">1er Lapso</legend>
		<label class="input-group">
			<span class="input__label">Fecha de inicio:</span>
			<input class="input" type="date" name="lapsos[primer][inicio]" required value="<?= $period->getLapse(1)?->startDate ?>" />
		</label>

		<label class="input-group">
			<span class="input__label">Fecha de fin:</span>
			<input class="input" type="date" name="lapsos[primer][fin]" required value="<?= $period->getLapse(1)?->endDate ?>" />
		</label>
	</fieldset>

	<fieldset class="form__group">
		<legend class="form__group-legend">2er Lapso</legend>
		<label class="input-group">
			<span class="input__label">Fecha de inicio:</span>
			<input class="input" type="date" name="lapsos[segundo][inicio]" required value="<?= $period->getLapse(2)?->startDate ?>" />
		</label>

		<label class="input-group">
			<span class="input__label">Fecha de fin:</span>
			<input class="input" type="date" name="lapsos[segundo][fin]" required value="<?= $period->getLapse(2)?->endDate ?>" />
		</label>
	</fieldset>

	<fieldset class="form__group">
		<legend class="form__group-legend">3er Lapso</legend>
		<label class="input-group">
			<span class="input__label">Fecha de inicio:</span>
			<input class="input" type="date" name="lapsos[tercer][inicio]" required value="<?= $period->getLapse(3)?->startDate ?>" />
		</label>

		<label class="input-group">
			<span class="input__label">Fecha de inicio:</span>
			<input class="input" type="date" name="lapsos[tercer][fin]" required value="<?= $period->getLapse(3)?->endDate ?>" />
		</label>
	</fieldset>
	<button class="button button--half">Actualizar</button>
</form>

<script>
	function setYear(inputYear) {
		inputYear.form.querySelectorAll('input[type="date"]').forEach(input => {
			const [, month, day] = input.value.split('-')
			const value = `${inputYear.value}-${month}-${day}`

			input.value = value
		})
	}
</script>
