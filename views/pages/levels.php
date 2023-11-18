<?php
	use App\Models\Level;
	/** @var Level[] $levels */
	/** @var string $root */
?>

<article>
<h2>Nivel</h2>
<a href="<?= $root ?>/niveles/registrar">
	<button>Añadir</button>
</a>
  <table>
    <thead>
      <tr>
        <th>Código de Nivel</th>
      </tr>
    </thead>
    <tbody>
		<?php foreach ($levels as $level) echo <<<HTML
			<tr>
				<td>{$level->name}</td>
			HTML ?>
		</tbody>
    </tbody>
  </table>
</article>
