<?php

/** @var string $root */
?>

<form class="form" action="<?= $root ?>/periodos" method="post">
	<h2>Registro de periodo</h2>

	<fieldset class="form__group">
		<legend class="form__group-legend">Datos año</legend>
		<label class="input-group input-group--animate">
			<input class="input" type="year" name="inicio" required min="1970" max="<?= date('Y') ?>" />
			<span class="input__label">Año de inicio:</span>
		</label>
		<fieldset>

			<fieldset class="form__group">
				<legend class="form__group-legend">1er Lapso</legend>
				<label class="input-group">
					<span class="input__label">Fecha de inicio:</span>
					<input class="input" type="date" name="lapsos[primer][inicio]" required />
				</label>

				<label class="input-group">
					<span class="input__label">Fecha de fin:</span>
					<input class="input" type="date" name="lapsos[primer][fin]" required />
				</label>
			</fieldset>

			<fieldset class="form__group">
				<legend class="form__group-legend">2er Lapso</legend>
				<label class="input-group">
					<span class="input__label">Fecha de inicio:</span>
					<input class="input" type="date" name="lapsos[segundo][inicio]" required />
				</label>

				<label class="input-group">
					<span class="input__label">Fecha de fin:</span>
					<input class="input" type="date" name="lapsos[segundo][fin]" required />
				</label>
			</fieldset>

			<fieldset class="form__group">
				<legend class="form__group-legend">3er Lapso</legend>
				<label class="input-group">
					<span class="input__label">Fecha de inicio:</span>
					<input class="input" type="date" name="lapsos[tercer][inicio]" required />
				</label>

				<label class="input-group">
					<span class="input__label">Fecha de inicio:</span>
					<input class="input" type="date" name="lapsos[tercer][fin]" required />
				</label>
			</fieldset>
			<button>Registrar</button>
</form>