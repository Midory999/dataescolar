<?php
	use App\Models\Level;
	/** @var Level[] $levels */
	/** @var string $root */
?>

<h2>Nivel</h2>
<a href="<?= $root ?>/niveles/registrar">
	<button>Añadir</button>
</a>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Código</th>
      </tr>
    </thead>
    <tbody id="level-list">
      <!-- Aquí se mostrarán los estudiantes -->
    </tbody>
  </table>