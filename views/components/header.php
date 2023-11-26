<?php

/** @var App\Models\User $user */
/** @var ?App\Models\Period $currentPeriod */
?>

<header>
	<?php include __DIR__ . '/navigation.php' ?>
	<h1>Bienvenido <?= $user->name ?></h1>
	<h2>
		Periodo actual:
		<?= $currentPeriod ?? '<strong>No establecido</strong>' ?>
	</h2>
</header>
