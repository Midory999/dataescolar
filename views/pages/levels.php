<?php
	use App\Models\Level;
	/** @var Level[] $levels */
	/** @var string $root */
?>

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
    <tbody id="level-list">
      <!-- Aquí se mostrarán los estudiantes -->
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