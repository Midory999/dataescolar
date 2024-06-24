<?php

use App\Models\Period;
use App\Models\Report;

assert($report instanceof Report);
assert(is_null($currentPeriod) || $currentPeriod instanceof Period);

$meses = [
	'01' => 'Enero',
	'02' => 'Febrero',
	'03' => 'Marzo',
	'04' => 'Abril',
	'05' => 'Mayo',
	'06' => 'Junio',
	'07' => 'Julio',
	'08' => 'Agosto',
	'09' => 'Septiembre',
	'10' => 'Octubre',
	'11' => 'Noviembre',
	'12' => 'Diciembre'
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<base href="<?= str_replace('index.php', '', $_SERVER['SCRIPT_NAME']) ?>" />
	<title>Reporte</title>
	<link rel="stylesheet" href="./assets/libs/w3css/w3.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" />
	<style>
		.gochi {
			font-family: 'Gochi Hand' !important;
		}

		.dancing {
			font-family: 'Dancing Script' !important;
		}

		body {
			width: 21.59cm;
			height: 27.94cm;
			border: thick solid black;
			box-sizing: border-box;
			margin: auto;
		}
	</style>
</head>

<body>
	<header>
		<h2 class="w3-medium w3-center">
			<b>
				REPÚBLICA BOLIVARIANA DE VENEZUELA<br />
				MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN<br />
				INSTITUTO DE EDUCACIÓN ESPECIAL "JUAN CARLOS AZUAJE"<br />
				PARROQUIA TUCANÍ ESTADO MÉRIDA<br />
				CIRCUITO 000
			</b>
		</h2>
	</header>
	<main>
		<h1 class="w3-large w3-center">
			<b>INFORME DESCRIPTIVO DEL RENDIMIENTO ESTUDIANTIL</b>
		</h1>
		<span class="w3-block w3-center w3-large">Año escolar: <?= $currentPeriod ?></span>
		<section class="w3-margin-top w3-justify w3-padding-large">
			Apellidos y nombres: <u class="dancing w3-xlarge"><?= str_repeat('&nbsp;', 20) . join(' ', array_reverse(explode(' ', $report->student))) . str_repeat('&nbsp;', 20) ?></u>
			Edad: <u class="dancing w3-xlarge"><?= str_repeat('&nbsp;', 10) . $report->student->age . str_repeat('&nbsp;', 10) ?></u>
			Cédula: <u class="dancing w3-xlarge"><?= str_repeat('&nbsp;', 10) . $report->student->idCard . str_repeat('&nbsp;', 10) ?></u>
			Nivel académico: <u class="dancing w3-xlarge"><?= str_repeat('&nbsp;', 20) . $report->area->getName() . str_repeat('&nbsp;', 20) ?></u>
			Nacido(a) en: <u class="dancing w3-xlarge"><?= str_repeat('&nbsp;', 5) . $report->student->birthPlace . str_repeat('&nbsp;', 5) ?></u>
			el <u class="dancing w3-xlarge"><?= str_repeat('&nbsp;', 5) . $report->student->getBirthDate('d') . str_repeat('&nbsp;', 5) ?></u>
			del mes de <u class="dancing w3-xlarge"><?= str_repeat('&nbsp;', 5) . $meses[$report->student->getBirthDate('m')] . str_repeat('&nbsp;', 5) ?></u>
			del <u class="dancing w3-xlarge"><?= str_repeat('&nbsp;', 10) . $report->student->getBirthDate('Y') . str_repeat('&nbsp;', 10) ?></u>
			Representante: <u class="dancing w3-xlarge"><?= str_repeat('&nbsp;', 15) . $report->student->representative . str_repeat('&nbsp;', 15) ?></u>
			Docente: <u class="dancing w3-xlarge"><?= str_repeat('&nbsp;', 10) . $report->teacher . str_repeat('&nbsp;', 10) ?></u>
		</section>
		<section class="w3-justify w3-padding-large">
			<h2>
				<b>INFORME FINAL</b>
			</h2>
			<u class="dancing w3-xlarge"><?= $report->finalInform ?></u>
		</section>
	</main>
	<footer></footer>
</body>

</html>
