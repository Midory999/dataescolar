<?php

/** @var App\Models\User[] $users */
/** @var string $root */
?>

<section>
	<h2>Usuarios</h2>
	<a class="w3-button w3-round-medium w3-pink" href="<?= $root ?>/usuarios/añadir">
		Añadir
	</a>
	<div class="w3-responsive w3-section">
		<table class="w3-table-all">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Cédula</th>
					<th>Rol</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user) echo <<<HTML
					<tr>
						<td>$user->name</td>
						<td>$user->lastname</td>
						<td>$user->idCard</td>
						<td>$user->role</td>
					</tr>
				HTML ?>
			</tbody>
		</table>
	</div>
</section>
