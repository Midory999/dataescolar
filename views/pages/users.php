<?php
	use App\Models\User;
	/** @var User[] $users */
	/** @var string $root */
?>

<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css"
/>

<h1>Usuarios</h1>
<a href="<?= $root ?>/ingresar">Añadir</a>
<table>
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
