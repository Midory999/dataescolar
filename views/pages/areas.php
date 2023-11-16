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
        <th>Nombre</th>
      </tr>
    </thead>
		<tbody>
		<?php foreach ($areas as $area) echo <<<HTML
		<tr>
			<td>{$area->names}</td>
			<td>{$area->lastname}</td>
			<td>{$area->idCard}</td>

		HTML ?>
	</tbody>
</table>
