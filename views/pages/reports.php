<?php

/** @var App\Models\Report[] $reports */
/** @var string $root */
?>

<section class="w3-section">
	<h2 class="w3-xlarge">Informe</h2>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/informes/registrar">
		Añadir
	</a>
	<div class="w3-responsive w3-section">
		<table class="w3-table-all">
			<thead>
				<tr>
					<th>Diagnóstico</th>
					<th>Lapso 1</th>
					<th>Lapso 2</th>
					<th>Lapso 3</th>
					<th>Informe Final</th>
					<th>Código de Area</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($reports as $report) echo <<<HTML
				<tr>
					<td>{diagnostico}</td>
					<td>{lapso1}</td>
					<td>{lapso2}</td>
					<td>{lapso3}</td>
					<td>{informe final}</td>
					<td>{$report->area->getCode()}</td>
				</tr>
				HTML ?>
			</tbody>
		</table>
	</div>
</section>
