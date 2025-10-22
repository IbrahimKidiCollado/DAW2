<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles.css">
	<title>Ejecicio 4</title>
</head>
<body>
	<?php

	if (array_key_exists('date', $_POST)) 
	{
		$años = $_POST['date'];
		$resultado = calcular_años($años);

		echo <<<HTML
			<div class='contenedor'>
				<p>Tienes $resultado[año] años $resultado[mes] meses y $resultado[dia] dias</p>
			</div>
		HTML;
	} else {
		$hoy = date('d/m/Y');
		echo <<<HTML
			<div class="contenedor">
				<form action="index.php" method="post">
					<label for="date">Introduce tu fecha de nacimiento</label><br><br>
					<input type="date" name="date" min="1900-01-01" max="$hoy" required>
					<input type="submit" value="Enviar">
				</form>
			</div>
		HTML;
	}

	function calcular_años($años) {
		$fec_nac = new DateTime($años);
		$hoy = new DateTime();
		$resultado = $hoy->diff($fec_nac);
		return $tiempo = array(
			'dia' => $resultado->d,
			'mes' => $resultado->m,
			'año' => $resultado->y
		);
	}
	?>
</body>
</html>