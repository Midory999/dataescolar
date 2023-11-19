<?php

/** @var App\Models\Representative[] $representatives */
/** @var string $root */
/** @var null|string $message */
?>

<h2>Representantes</h2>
<a href="<?= $root ?>/representantes/registrar">
	<button>Añadir</button>
</a>
<table>
	<thead>
		<tr>
			<th>Cédula</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Género</th>
			<th>Dirección</th>
			<th>Correo</th>
			<th>Teléfono</th>
			<th>Estudio</th>
			<th>Tipo de Sangre</th>
			<th>Ocupación</th>
			<th>Lugar de Trabajo</th>
			<th>Estudio Socioeconómico</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($representatives as $representative) echo <<<HTML
		  <td>{$representative->idCard}</td>
			<td>{$representative->names}</td>
			<td>{$representative->lastnames}</td>
			<td>{$representative->gender}</td>
			<td>{$representative->direction}</td>
			<td>{$representative->email}</td>
			<td>{$representative->phone}</td>
			<td>{$representative->studies}</td>
			<td>{$representative->bloodType}</td>
			<td>{$representative->ocupation}</td>
			<td>{$representative->jobPlace}</td>
			<td>{$representative->studies}</td>
</tr>
HTML  ?>
	</tbody>
</table>