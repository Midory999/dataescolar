<?php
	/** @var string $root */
	/** @var App\Models\User $user */
?>

<a href="#" class="card">
	<div class="card__image card__image--h100">
		<?php include __DIR__ . '/../components/clock.php' ?>
	</div>
</a>
<a href="#" class="card">
	<img class="card__image animated--zoom" src="<?= $assets ?>/images/card6.png" />
</a>
<a href="#" class="card">
	<img class="card__image animated--zoom" src="<?= $assets ?>/images/card6.png" />
</a>
<article class="card card--2y">
	<img class="card__image animated--zoom" src="<?= $assets ?>/images/card5.png" />
	<form action="#" class="checkboxes">
		<label>
			<input type="checkbox" checked />
			<span class="checkbox__icon"></span>
			Tarea 1
		</label>
		<label>
			<input type="checkbox" />
			<span class="checkbox__icon"></span>
			Tarea 2
		</label>
		<label>
			<input type="checkbox" />
			<span class="checkbox__icon"></span>
			Tarea 2
		</label>
		<label>
			<input type="checkbox" />
			<span class="checkbox__icon"></span>
			...
		</label>
		<label>
			<input type="checkbox" />
			<span class="checkbox__icon"></span>
			Tarea n
		</label>
	</form>
</article>
<div class="cards">
	<a href="<?= $root ?>/representantes" class="card">
		<figure>
			<img class="card__image animated--zoom" src="<?= $assets ?>/images/card1.png" />
			<figcaption>
				<img src="<?= $assets ?>/images/flower3.png" />
				Representantes
			</figcaption>
		</figure>
	</a>
	<a href="#" class="card">
		<figure>
			<img class="card__image animated--zoom" src="<?= $assets ?>/images/card2.png" />
			<figcaption>
				<img src="<?= $assets ?>/images/flower3.png" />
				Materias
			</figcaption>
		</figure>
	</a>
	<a href="#" class="card">
		<figure>
			<img class="card__image animated--zoom" src="<?= $assets ?>/images/card3.png" />
			<figcaption>
				<img src="<?= $assets ?>/images/flower3.png" />
				Gastos
			</figcaption>
		</figure>
	</a>
	<a href="#" class="card">
		<figure>
			<img class="card__image animated--zoom" src="<?= $assets ?>/images/card4.png" />
			<figcaption>
				<img src="<?= $assets ?>/images/flower3.png" />
				Plan para exámenes
			</figcaption>
		</figure>
	</a>
</div>
