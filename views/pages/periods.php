<?php
	use App\Models\Period;
	/** @var Period[] $periods */
	/** @var string $root */
	/** @var null|string $message */
?>

<h2>Periodos</h2>
<a href="<?= $root ?>/periodos/registrar">
	<button>Añadir</button>
</a>
<table>
	<thead>
		<tr>
			<th>Fecha de Inicio</th>
			<th>Fecha de Cierre</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($periods as $period) echo <<<HTML
			<tr>
				<td>{$period->getStartYear()}</td>
				<td>{$period->getEndYear()}</td>
			</tr>
		HTML ?>
	</tbody>
</table>

<?php
	if ($message !== null) {
		echo <<<HTML
		<script>
			alert(`$message`)
		</script>
		HTML;
	}
?>