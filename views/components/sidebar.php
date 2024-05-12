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
			<summary class="menu__text">Areas</summary>
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
			<summary class="menu__text">Profesores</summary>
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
					<a class="menu__submenu-text" href="./configuracion">Respaldo y Restauración</a>
				</li>
				<?= $links['config']['config'] ?? '' ?>
			</ul>
		</details>
	</ul>
</aside>
