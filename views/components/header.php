<?php

use App\Models\Period;

/** @var App\Models\User $user */
/** @var ?Period $currentPeriod */

?>

<header class="header">
	<button data-pushbar-target="about" class="header__about-icon animated--zoom">
		<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 17 28">
			<path d="M11 19.625v3.75c0 0.344-0.281 0.625-0.625 0.625h-3.75c-0.344 0-0.625-0.281-0.625-0.625v-3.75c0-0.344 0.281-0.625 0.625-0.625h3.75c0.344 0 0.625 0.281 0.625 0.625zM15.937 10.25c0 2.969-2.016 4.109-3.5 4.937-0.922 0.531-1.5 1.609-1.5 2.063v0c0 0.344-0.266 0.75-0.625 0.75h-3.75c-0.344 0-0.562-0.531-0.562-0.875v-0.703c0-1.891 1.875-3.516 3.25-4.141 1.203-0.547 1.703-1.062 1.703-2.063 0-0.875-1.141-1.656-2.406-1.656-0.703 0-1.344 0.219-1.687 0.453-0.375 0.266-0.75 0.641-1.672 1.797-0.125 0.156-0.313 0.25-0.484 0.25-0.141 0-0.266-0.047-0.391-0.125l-2.562-1.953c-0.266-0.203-0.328-0.547-0.156-0.828 1.687-2.797 4.062-4.156 7.25-4.156 3.344 0 7.094 2.672 7.094 6.25z"></path>
		</svg>
	</button>
	<img src="./assets/images/flower1.png" width="75" height="75" />
	<h1 class="header__title"><?= $school->name ?></h1>
	<h4>
		Periodo actual:
		<strong><?= $currentPeriod ?? 'No establecido' ?></strong>
	</h4>
	<?php include __DIR__ . '/navigation.php' ?>
	<hr class="header__separator" />
</header>
