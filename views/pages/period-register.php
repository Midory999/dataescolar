<?php
/** @var string $root */
/** @var string $periodYearValidationPattern */
?>

<form action="<?= $root ?>/periodos" method="post">
	<h2>Registro de periodo</h2>

	<label>
		Año de inicio:
		<input type="year" name="inicio" required min="1970" max="<?= date('Y') ?>" />
	</label>
	<fieldset>
		<legend>1er Lapso</legend>
		<label>
			Fecha de inicio:
			<input type="date" name="lapsos[primer][inicio]" required />
		</label>
		<label>
			Fecha de fin:
			<input type="date" name="lapsos[primer][fin]" required />
		</label>
	</fieldset>
	<fieldset>
		<legend>2do Lapso</legend>
		<label>
			Fecha de inicio:
			<input type="date" name="lapsos[segundo][inicio]" required />
		</label>
		<label>
			Fecha de fin:
			<input type="date" name="lapsos[segundo][fin]" required />
		</label>
	</fieldset>
	<fieldset>
		<legend>3er Lapso</legend>
		<label>
			Fecha de inicio:
			<input type="date" name="lapsos[tercer][inicio]" required />
		</label>
		<label>
			Fecha de fin:
			<input type="date" name="lapsos[tercer][fin]" required />
		</label>
	</fieldset>
	<button>Registrar</button>
</form>
