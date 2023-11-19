<?php

/** @var string $root */
/** @var App\Models\User $user */

$links = [];

if ($user->isAdmin()) {
	$links['student']['register'] = <<<HTML
	<li class="menu__submenu-item">
		<a class="menu__submenu-text" href="$root/estudiantes/registrar">Registrar</a>
	</li>
	HTML;

	$links['teacher']['register'] = <<<HTML
	<li class="menu__submenu-item">
		<a class="menu__submenu-text" href="$root/profesores/registrar">Registrar</a>
	</li>
	HTML;

	$links['users'] = <<<HTML
	<details class="menu__link">
		<summary class="menu__text">Usuarios</summary>
		<ul class="menu__submenu">
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="$root/usuarios">Listado</a>
			</li>
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="$root/usuarios/registrar">Registrar</a>
			</li>
		</ul>
	</details>
	HTML;

	$links['inscription'] = <<<HTML
	<details class="menu__link">
		<summary class="menu__text">Inscripciones</summary>
		<ul class="menu__submenu">
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="$root/inscripciones">Listado</a>
			</li>
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="$root/inscripciones/registrar">Añadir</a>
			</li>
		</ul>
	</details>
	HTML;

	$links['report'] = <<<HTML
	<details class="menu__link">
		<summary class="menu__text">Informes</summary>
		<ul class="menu__submenu">
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="$root/informes">Listado</a>
			</li>
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="$root/informe/registrar">Registrar</a>
			</li>
		</ul>
	</details>
	HTML;

	$links['periods'] = <<<HTML
	<details class="menu__link">
		<summary class="menu__text">Periodos</summary>
		<ul class="menu__submenu">
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="$root/periodos">Listado</a>
			</li>
			<li class="menu__submenu-item">
				<a class="menu__submenu-text" href="$root/periodos/registrar">Añadir</a>
			</li>
		</ul>
	</details>
	HTML;

	$links['periods'] = <<<HTML
	<div class="menu__link">
		<a href="$root/configuracion" class="menu__text">Configuración</a>
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
					<a class="menu__submenu-text" href="<?= $root ?>/usuarios">Listado</a>
				</li>
				<?= $links['users']['register'] ?? '' ?>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Inscripciones</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="<?= $root ?>/inscripciones">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/inscripciones/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Informes</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="<?= $root ?>/informes">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/informes/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Representantes</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="<?= $root ?>/representantes">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/representantes/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Estudiantes</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="<?= $root ?>/estudiantes">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/estudiantes/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Niveles</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="<?= $root ?>/niveles">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/niveles/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Areas</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="<?= $root ?>/areas">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/areas/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Periodos</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/periodos">Listado</a>
				</li>
				<?= $links['period']['register'] ?? '' ?>
			</ul>
			<summary class="menu__text">Lapsos</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a href="<?= $root ?>/lapsos">Listado</a>
				</li>
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/lapsos/registrar">
						Registrar
					</a>
				</li>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Profesores</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/profesores">Listado</a>
				</li>
				<?= $links['teacher']['register'] ?? '' ?>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Aulas</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/aulas">Listado</a>
				</li>
				<?= $links['classroom']['register'] ?? '' ?>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Informes</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/informes">Listado</a>
				</li>
				<?= $links['report']['register'] ?? '' ?>
			</ul>
		</details>
		<details class="menu__link">
			<summary class="menu__text">Configuraciones</summary>
			<ul class="menu__submenu">
				<li class="menu__submenu-item">
					<a class="menu__submenu-text" href="<?= $root ?>/configuracion">Respaldo y Restauración</a>
				</li>
				<?= $links['config']['config'] ?? '' ?>
			</ul>
		</details>
	</ul>
</aside>