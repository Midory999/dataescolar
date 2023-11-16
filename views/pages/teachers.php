<?php
	use App\Models\Teacher;
	/** @var Teacher[] $teachers */
	/** @var string $root */
?>

<h2>Profesores</h2>
<a href="<?= $root ?>/profesores/registrar">
	<button>Añadir</button>
</a>
  <table>
    <thead>
      <tr>
        <th>Cédula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Estatus</th>
        <th>Especialidad</th>
        <th>Dirección</th>
        <th>Correo</th>
        <th>telefono</th>
        <th>Ingreso</th>
        <th>Fecha de Nacimiento</th>
        <th>Edad</th>
        <th>Género</th>
        <th>Vacunas</th>
        <th>Carga Horaria</th>
        <th>Código de Independencia</th>
        <th>Código de Área</th>
      </tr>
    </thead>
    <tbody>
		<?php foreach ($areas as $area) echo <<<HTML
		<tr>
			<td>{$area->areaCode}</td>
			<td>{$area->names}</td>
			</tr>
		HTML ?>
	</tbody>
</table>