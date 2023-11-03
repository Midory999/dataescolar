<?php
	use App\Models\Inscription;
	/** @var Inscription[] $inscription */
	/** @var string $root */
?>

<h2>Inscripciones</h2>
<a href="<?= $root ?>/inscripciones/registrar">
	<button>Añadir</button>
	</a>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>ID Estudiante</th>
        <th>ID Periodo</th>
        <th>ID Nivel</th>
      </tr>
    </thead>
    <tbody id="inscription-list">
      <!-- Aquí se mostrarán los estudiantes -->
    </tbody>
  </table>