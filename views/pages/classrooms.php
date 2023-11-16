<?php

/** @var App\Models\Classroom[] $Classrooms */
/** @var string $root */
?>

<h2>Aula</h2>
<a href="<?= $root ?>/aulas/registrar">
	<button>Añadir</button>
</a>
<table>
	<thead>
		<tr>
			<th>Nombre</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($teachers as $teacher) echo <<<HTML
		<tr>
			<td>{$teacher->idCard}</td>
			<td>{$teacher->names}</td>
			<td>{$teacher->lastnames}</td>
			<td>{$teacher->status}</td>
			<td>{$teacher->specialty}</td>
			<td>{$teacher->address}</td>
			<td>{$teacher->mail}</td>
			<td>{$teacher->phone}</td>
			<td>{$teacher->income}</td>
			<td>{$teacher->birthdate}</td>
			<td>{$teacher->age}</td>
			<td>{$teacher->gender}</td>
			<td>{$teacher->vaccines}</td>
			<td>{$teacher->workload}</td>
			<td>{$teacher->independenceCode}</td>
			<td>{$teacher->areaID}</td>
		</tr>
		HTML ?>
	</tbody>
</table>
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
