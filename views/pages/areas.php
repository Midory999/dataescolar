<?php

/** @var App\Models\Area[] $areas */
/** @var string $root */
/** @var null|string $message */
?>

<section class="w3-section">
	<h2>Áreas</h2>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/areas/registrar">Añadir</a>
	<div class="cards cards--4col w3-section">
		<?php foreach ($areas as $area) echo <<<HTML
			<a href="$root/areas/{$area->getSlug()}" class="card">
				<figure>
					<img class="card__image animated--zoom" src="$assets/images/card7.png" />
					<figcaption>
						<img src="$assets/images/flower3.png" />
						$area->name
					</figcaption>
				</figure>
			</a>
		HTML ?>
	</div>
</section>
