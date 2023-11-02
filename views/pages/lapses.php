<?php
	use App\Models\Lapse;
	/** @var Lapse[] $lapses */
	/** @var string $root */
?>

<h2>Lapse</h2>
<a href="<?= $root ?>/lapsos/registrar">
	<button>Añadir</button>
	</a>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>ID Periodo</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Nombre</th>
      </tr>
    </thead>
    <tbody id="lapse-list">
      <!-- Aquí se mostrarán los estudiantes -->
    </tbody>
  </table>
