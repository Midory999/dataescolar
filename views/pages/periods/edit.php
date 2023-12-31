<?php

/** @var string $root */

use App\Models\Period;
/** @var Period $period */
/** @var ?string $error */
?>

<form class="form" action="<?= $root ?>/periodos/<?= $period->startYear ?>" method="post">
	<h2>Editar Periodo</h2>

	<label class="input-group">
		<input readonly class="input" type="year" name="inicio" required min="1970" max="<?= date('Y') ?>" value="<?= $period->startYear ?>" />
		<span class="input__label">Año de inicio:</span>
	</label>

	<fieldset class="form__group">
		<legend class="form__group-legend">1er Lapso</legend>
		<label class="input-group">
			<span class="input__label">Fecha de inicio:</span>
			<input class="input" type="date" name="lapsos[primer][inicio]" required value="<?= $period->getLapse(1)->startDate ?>" />
		</label>

		<label class="input-group">
			<span class="input__label">Fecha de fin:</span>
			<input class="input" type="date" name="lapsos[primer][fin]" required value="<?= $period->getLapse(1)->endDate ?>" />
		</label>
	</fieldset>

	<fieldset class="form__group">
		<legend class="form__group-legend">2er Lapso</legend>
		<label class="input-group">
			<span class="input__label">Fecha de inicio:</span>
			<input class="input" type="date" name="lapsos[segundo][inicio]" required value="<?= $period->getLapse(2)->startDate ?>" />
		</label>

		<label class="input-group">
			<span class="input__label">Fecha de fin:</span>
			<input class="input" type="date" name="lapsos[segundo][fin]" required value="<?= $period->getLapse(2)->endDate ?>" />
		</label>
	</fieldset>

	<fieldset class="form__group">
		<legend class="form__group-legend">3er Lapso</legend>
		<label class="input-group">
			<span class="input__label">Fecha de inicio:</span>
			<input class="input" type="date" name="lapsos[tercer][inicio]" required value="<?= $period->getLapse(3)->startDate ?>" />
		</label>

		<label class="input-group">
			<span class="input__label">Fecha de inicio:</span>
			<input class="input" type="date" name="lapsos[tercer][fin]" required value="<?= $period->getLapse(3)->endDate ?>" />
		</label>
	</fieldset>
	<button class="button button--half">Actualizar</button>
</form>
