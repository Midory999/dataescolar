<?php
	use App\Models\Area;
	/** @var Area[] $area */
	/** @var string $root */
?>

<h2>Área</h2>
<a href="<?= $root ?>/areas/registrar">
	<button>Añadir</button>
</a>
  <table>
    <thead>
      <tr>
        <th>Código de Area</th>
      </tr>
    </thead>
    <tbody id="area-list">
      <!-- Aquí se mostrarán los estudiantes -->
    </tbody>
  </table>