<?php

use App\Models\User;

/** @var User $user */

$links = [];

if ($user->isAdmin()) {
	$links['student']['register'] = <<<HTML
	<li class="menu__submenu-item">
		<a class="menu__submenu-text" href="./estudiantes/registrar">Registrar</a>
	</li>
	HTML;

	$links['teacher']['register'] = <<<HTML
	<li class="menu__submenu-item">
		<a class="menu__submenu-text" href="./profesores/registrar">Registrar</a>
	</li>
	HTML;

	$links['users'] = <<<HTML
	<details class="menu__link">
		<summary class="menu__text">Usuarios</summary>
		<ul class="menu__submenu">
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="./usuarios">Listado</a>
			</li>
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="./usuarios/registrar">Registrar</a>
			</li>
		</ul>
	</details>
	HTML;

	$links['inscription'] = <<<HTML
	<details class="menu__link">
		<summary class="menu__text">Inscripciones</summary>
		<ul class="menu__submenu">
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="./inscripciones">Listado</a>
			</li>
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="./inscripciones/registrar">Añadir</a>
			</li>
		</ul>
	</details>
	HTML;

	$links['report'] = <<<HTML
	<details class="menu__link">
		<summary class="menu__text">Informes</summary>
		<ul class="menu__submenu">
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="./informes">Listado</a>
			</li>
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="./informe/registrar">Registrar</a>
			</li>
		</ul>
	</details>
	HTML;

	$links['periods'] = <<<HTML
	<details class="menu__link">
		<summary class="menu__text">
			Periodos
		</summary>
		<ul class="menu__submenu">
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="./periodos">Listado</a>
			</li>
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="./periodos/registrar">Añadir</a>
			</li>
		</ul>
	</details>
	HTML;

	$links['periods'] = <<<HTML
	<div class="menu__link">
		<a href="./configuracion" class="menu__text">Configuración</a>
	</div>
	HTML;
}

?>

<aside data-pushbar-id="sidebar" data-pushbar-direction="left" class="pushbar">
	<ul class="menu">
		</details>
		<details class="menu__link">
			<summary class="menu__text">Usuarios</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./usuarios">Listado</a>
				</li>
				<?= $links['users']['register'] ?? '' ?>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Inscripciones</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="./inscripciones">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./inscripciones/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Informes</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="./informes">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./informes/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Representantes</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="./representantes">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./representantes/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Estudiantes</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="./estudiantes">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./estudiantes/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Niveles</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="./niveles">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./niveles/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">
					<path d="M25.609 7.469c0.391 0.562 0.5 1.297 0.281 2.016l-4.297 14.156c-0.391 1.328-1.766 2.359-3.109 2.359h-14.422c-1.594 0-3.297-1.266-3.875-2.891-0.25-0.703-0.25-1.391-0.031-1.984 0.031-0.313 0.094-0.625 0.109-1 0.016-0.25-0.125-0.453-0.094-0.641 0.063-0.375 0.391-0.641 0.641-1.062 0.469-0.781 1-2.047 1.172-2.859 0.078-0.297-0.078-0.641 0-0.906 0.078-0.297 0.375-0.516 0.531-0.797 0.422-0.719 0.969-2.109 1.047-2.844 0.031-0.328-0.125-0.688-0.031-0.938 0.109-0.359 0.453-0.516 0.688-0.828 0.375-0.516 1-2 1.094-2.828 0.031-0.266-0.125-0.531-0.078-0.812 0.063-0.297 0.438-0.609 0.688-0.969 0.656-0.969 0.781-3.109 2.766-2.547l-0.016 0.047c0.266-0.063 0.531-0.141 0.797-0.141h11.891c0.734 0 1.391 0.328 1.781 0.875 0.406 0.562 0.5 1.297 0.281 2.031l-4.281 14.156c-0.734 2.406-1.141 2.938-3.125 2.938h-13.578c-0.203 0-0.453 0.047-0.594 0.234-0.125 0.187-0.141 0.328-0.016 0.672 0.313 0.906 1.391 1.094 2.25 1.094h14.422c0.578 0 1.25-0.328 1.422-0.891l4.688-15.422c0.094-0.297 0.094-0.609 0.078-0.891 0.359 0.141 0.688 0.359 0.922 0.672zM8.984 7.5c-0.094 0.281 0.063 0.5 0.344 0.5h9.5c0.266 0 0.562-0.219 0.656-0.5l0.328-1c0.094-0.281-0.063-0.5-0.344-0.5h-9.5c-0.266 0-0.562 0.219-0.656 0.5zM7.688 11.5c-0.094 0.281 0.063 0.5 0.344 0.5h9.5c0.266 0 0.562-0.219 0.656-0.5l0.328-1c0.094-0.281-0.063-0.5-0.344-0.5h-9.5c-0.266 0-0.562 0.219-0.656 0.5z"></path>
				</svg>
				&nbsp;Áreas de aprendizaje
			</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="./areas">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./areas/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">
					<path d="M2 26h4.5v-4.5h-4.5v4.5zM7.5 26h5v-4.5h-5v4.5zM2 20.5h4.5v-5h-4.5v5zM7.5 20.5h5v-5h-5v5zM2 14.5h4.5v-4.5h-4.5v4.5zM13.5 26h5v-4.5h-5v4.5zM7.5 14.5h5v-4.5h-5v4.5zM19.5 26h4.5v-4.5h-4.5v4.5zM13.5 20.5h5v-5h-5v5zM8 7v-4.5c0-0.266-0.234-0.5-0.5-0.5h-1c-0.266 0-0.5 0.234-0.5 0.5v4.5c0 0.266 0.234 0.5 0.5 0.5h1c0.266 0 0.5-0.234 0.5-0.5zM19.5 20.5h4.5v-5h-4.5v5zM13.5 14.5h5v-4.5h-5v4.5zM19.5 14.5h4.5v-4.5h-4.5v4.5zM20 7v-4.5c0-0.266-0.234-0.5-0.5-0.5h-1c-0.266 0-0.5 0.234-0.5 0.5v4.5c0 0.266 0.234 0.5 0.5 0.5h1c0.266 0 0.5-0.234 0.5-0.5zM26 6v20c0 1.094-0.906 2-2 2h-22c-1.094 0-2-0.906-2-2v-20c0-1.094 0.906-2 2-2h2v-1.5c0-1.375 1.125-2.5 2.5-2.5h1c1.375 0 2.5 1.125 2.5 2.5v1.5h6v-1.5c0-1.375 1.125-2.5 2.5-2.5h1c1.375 0 2.5 1.125 2.5 2.5v1.5h2c1.094 0 2 0.906 2 2z"></path>
				</svg>
				&nbsp;Periodos
			</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./periodos">
						Listado
					</a>
				</li>
				<?= $links['period']['register'] ?? '' ?>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">
				<svg xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 640 512">
					<path d="M192 96a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm-8 384V352h16V480c0 17.7 14.3 32 32 32s32-14.3 32-32V192h56 64 16c17.7 0 32-14.3 32-32s-14.3-32-32-32H384V64H576V256H384V224H320v48c0 26.5 21.5 48 48 48H592c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H368c-26.5 0-48 21.5-48 48v80H243.1 177.1c-33.7 0-64.9 17.7-82.3 46.6l-58.3 97c-9.1 15.1-4.2 34.8 10.9 43.9s34.8 4.2 43.9-10.9L120 256.9V480c0 17.7 14.3 32 32 32s32-14.3 32-32z" />
				</svg>
				&nbsp;Profesores
			</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./profesores">Listado</a>
				</li>
				<?= $links['teacher']['register'] ?? '' ?>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Aulas</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./aulas">Listado</a>
				</li>
				<?= $links['classroom']['register'] ?? '' ?>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Informes</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./informes">Listado</a>
				</li>
				<?= $links['report']['register'] ?? '' ?>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Configuraciones</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="./configuracion">
						Respaldo y Restauración
					</a>
				</li>
				<?= $links['config']['config'] ?? '' ?>
			</ul>
		</details>
	</ul>
</aside>
