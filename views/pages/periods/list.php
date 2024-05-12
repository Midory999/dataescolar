<?php

use App\Models\Period;

/**
 * @var Period[] $periods
 * @var Period $currentPeriod
 */

?>

<section class="w3-section">
	<h2>Periodos</h2>
	<a class="w3-button w3-pink w3-round-medium" href="./periodos/registrar">Añadir</a>
	<div class="cards cards--2col w3-section">
		<?php foreach ($periods as $period):
			$actual = $period->getID() === $currentPeriod->getID() ? 'w3-pale-red' : '';
			echo <<<HTML
			<div class="card w3-border $actual">
				<a href="./periodos/{$period->getID()}/editar">
					<h3 class="w3-center">{$period}</h3>
					<ul class="w3-ul">
						<li class="w3-row-padding">
							<div class="w3-third">
								<span class="w3-tag w3-pink">1er Lapso</span>
							</div>
							<div class="w3-rest">
								<span>{$period->getLapse(1)}</span>
							</div>
						</li>
						<li class="w3-row w3-row-padding">
							<div class="w3-third">
								<span class="w3-tag w3-pink">2do Lapso</span>
							</div>
							<div class="w3-rest">
								<span>{$period->getLapse(2)}</span>
							</div>
						</li>
						<li class="w3-row w3-row-padding">
							<div class="w3-third">
								<span class="w3-tag w3-pink">3er Lapso</span>
							</div>
							<div class="w3-rest">
								<span>{$period->getLapse(3)}</span>
							</div>
						</li>
					</ul>
				</a>
			</div>
		HTML; endforeach ?>
	</div>
</section>
