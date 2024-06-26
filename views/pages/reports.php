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
					<th></th>
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
					<td>
						<a class="w3-button w3-pink w3-round-medium" href="$root/informes/{$report->id}">
							Imprimir
						</a>
					</td>
					<td>{$report->diagnostic}</td>
					<td>{$report->lapse1}</td>
					<td>{$report->lapse2}</td>
					<td>{$report->lapse3}</td>
					<td>{$report->finalInform}</td>
					<td>{$report->area->getCode()}</td>
				</tr>
				HTML ?>
			</tbody>
		</table>
	</div>
</section>
