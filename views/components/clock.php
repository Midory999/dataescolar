<?php
function getWeekDay() {
	$days = [1 => 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

	return $days[date('w')];
}
?>

<div class="clock">
	<span class="clock__time">
		<?= date('h') ?>
		:
		<?= date('i') ?>
	</span>
	<span class="clock__day"><?= getWeekDay() ?> <?= date('d') ?></span>
</div>
