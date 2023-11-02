<?php
	use App\Models\Representative;
	/** @var Representative[] $representatives */
	/** @var string $root */
?>

<h2>estudiante</h2>
<a href="<?= $root ?>/representantes/registrar">
	<button>Añadir</button>
	</a>
  <table>
    <thead>
      <tr>
        <th>ID</th>
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
      <!-- Aquí se mostrarán los estudiantes -->
    </tbody>
  </table>