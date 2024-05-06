<?php

/** @var App\Models\Period[] $periods */

?>

<section class="w3-section">
	<h2>Periodos</h2>
	<a class="w3-button w3-pink w3-round-medium" href="<?= $root ?>/periodos/registrar">Añadir</a>
	<div class="cards cards--2col w3-section">
		<?php foreach ($periods as $period) echo <<<HTML
			<div class="card w3-border">
				<h3 class="w3-center">{$period}</h3>
				<a href="$root/periodos/{$period->startYear}">
					<ul class="w3-ul">
						<li class="w3-row-padding">
							<div class="w3-third">
								<span class="w3-tag w3-pink">1er Lapso</span>
							</div>
							<div class="w3-rest">
								<span>{$period->getLapse(1)}</span>
							</div>
						</li>
						<li class="w3-row w3-row-padding">
							<div class="w3-third">
								<span class="w3-tag w3-pink">2do Lapso</span>
							</div>
							<div class="w3-rest">
								<span>{$period->getLapse(2)}</span>
							</div>
						</li>
						<li class="w3-row w3-row-padding">
							<div class="w3-third">
								<span class="w3-tag w3-pink">3er Lapso</span>
							</div>
							<div class="w3-rest">
								<span>{$period->getLapse(3)}</span>
							</div>
						</li>
					</ul>
				</a>
				<hr />
				<div class="w3-container">
					<small>
						<button class="w3-button w3-round-medium" onclick="confirmarEliminar(`$root/periodos/{$period->startYear}/eliminar`)">
							Eliminar
						</button>
					</small>
					<small>
						<a href="$root/periodos/{$period->startYear}/editar" class="w3-button w3-round-medium">
							Editar
						</a>
					</small>
				</div>
			</div>
		HTML ?>
	</div>
</section>

<script>
	function confirmarEliminar(url = location.href) {
		Swal.fire({
			title: '¿Confirma que desea eliminar?',
			showCancelButton: true,
			confirmButtonText: 'Confirmar',
			cancelButtonText: 'Cancelar',
		}).then(result => {
			if (result.isConfirmed) {
				location.href = url
			}
		})
	}
</script>
