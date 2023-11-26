<?php

/** @var App\Models\Level[] $levels */
/** @var string $root */
/** @var null|string $message */
?>

<section class="w3-section">
	<h2>Nivel</h2>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/niveles/registrar">Añadir</a>
	<div class="cards cards--4col w3-section">
		<?php foreach ($levels as $level) echo <<<HTML
			<a href="$root/niveles/$level->id" class="card">
				<figure>
					<img class="card__image animated--zoom" src="$assets/images/card7.png" />
					<figcaption>
						<img src="$assets/images/flower3.png" />
						$level->code
					</figcaption>
				</figure>
			</a>
		HTML ?>
	</div>
</section>
