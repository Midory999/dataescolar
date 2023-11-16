<?php
	use App\Models\Lapse;
	/** @var Lapse[] $lapses */
	/** @var string $root */
?>

<h2>Lapso</h2>
<a href="<?= $root ?>/lapsos/registrar">
	<button>Añadir</button>
	</a>
  <table>
    <thead>
      <tr>
        <th>Fecha de Inicio</th>
        <th>Fecha de Fin</th>
        <th>Nombre</th>
      </tr>
    </thead>
    <tbody>
		<?php foreach ($periods as $period) echo <<<HTML
			<tr>
			<td>{$period->idCard}</td>
			<td>{$period->periodDate}</td>
				</tr>
		HTML ?>
	</tbody>
</table>