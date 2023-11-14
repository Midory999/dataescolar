<?php
	use App\Models\Report;
	/** @var Report[] $reports */
	/** @var string $root */
?>

<h2>Informe</h2>
<a href="<?= $root ?>/informes/registrar">
	<button>Añadir</button>
	</a>
  <table>
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
		<?php foreach ($students as $student) echo <<<HTML
		<tr>
			<td>{$student->idCard}</td>
			<td>{$student->names}</td>
			<td>{$student->lastnames}</td>
			<td>{$student->birthDate}</td>
			<td>{$student->birthPlace}</td>
			<td>{$student->age}</td>
			<td>{$student->birthType}</td>
			<td>{$student->compromises}</td>
			<td>{$student->medicines}</td>
			<td>{$student->bloodType}</td>
			<td>{$student->gender}</td>
			<td>{$student->direction}</td>
			<td>{$student->measurements}</td>
			<td>{$student->vaccines}</td>
			<td>{$student->socialPrograms}</td>
			<td>{$student->admission}</td>
			<td>{$student->status}</td>
			<td>{$student->description}</td>
		</tr>
		HTML ?>
	</tbody>
</table>
<?php foreach ($areas as $area) echo <<<HTML
			<tr>
			<td>{$area->areaCode}</td>
			<td>{$area->names}</td>
				</tr>
		HTML ?>
	</tbody>
</table>
<?php foreach ($areas as $area) echo <<<HTML
			<tr>
			<td>{$area->id}</td>
			<td>{$area->levelCode}</td>
				</tr>
		HTML ?>
	</tbody>
</table>
