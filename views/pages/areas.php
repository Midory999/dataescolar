<?php

use App\Models\Area;

/** @var Area[] $areas */

?>

<section class="w3-section" id="listado">
	<h2>Áreas de aprendizaje</h2>
	<a class="w3-button w3-pink w3-round-medium" href="./areas/registrar">Añadir</a>
	<div class="cards cards--4col w3-section">
		<?php foreach ($areas as $area) echo <<<HTML
			<a href="$root/areas/{$area->getCode()}" class="card">
				<figure>
					<img class="card__image animated--zoom" src="./assets/images/card7.png" />
					<figcaption>
						<img src="./assets/images/flower3.png" />
						$area->name
					</figcaption>
				</figure>
			</a>
		HTML ?>
	</div>
</section>
