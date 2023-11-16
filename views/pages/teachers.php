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
		<?php foreach ($teachers as $teacher) echo <<<HTML
		<tr>
			<td>{$teacher->names}</td>
			<td>{$teacher->lastname}</td>
			<td>{$teacher->idCard}</td>
			<td>{$teacher->status}</td>
			<td>{$teacher->specialty}</td>
			<td>{$teacher->direction}</td>
			<td>{$teacher->email}</td>
			<td>{$teacher->phone}</td>
			<td>{$teacher->income}</td>
			<td>{$teacher->birthDate}</td>
			<td>{$teacher->age}</td>
			<td>{$teacher->gender}</td>
			<td>{$teacher->vaccines}</td>
			<td>{$teacher->socialPrograms}</td>
			</tr>
		HTML ?>
	</tbody>
</table>