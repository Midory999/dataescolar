<?php

use App\Models\Representative;

/** @var Representative[] $representatives */
/** @var string $root */

?>

<h2>Representante</h2>
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
		</tr>
	</thead>
	<tbody id="representative-list">
		<?php foreach ($representatives as $representative) echo <<<HTML
      <tr>
      	<!-- TODO: mostrar los representantes usando $-representative
      	guíate por el autocompletado al poner la flechita con - > pegado -->
      	<td>{$representative->idCard}</td><td>{$representative->names}</td><td>{$representative->lastnames}</td><td>{$representative->gender}</td><td>{$representative->direction}</td><td>{$representative->email}</td><td>{$representative->phone}</td><td>{$representative->studies}</td><td>{$representative->bloodType}</td><td>{$representative->ocupation}</td><td>{$representative->jobPlace}</td>
      </tr>
      HTML ?>
	</tbody>
</table>
