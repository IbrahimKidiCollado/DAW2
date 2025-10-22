<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicios1</title>
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
	<?php 
	if (array_key_exists('enviar_datos', $_POST)) {
		$frase = $_POST['frase'];
		$palabra = $_POST['palabra'];
		$resultado;
		
		if (comprobarPalabra($frase, $palabra)) {
			$resultado = 'Si';
		} else {
			$resultado = 'No';
		}

		echo " 
			<div class='contenedor'>
				<p>La frase: $frase</p>
				<p>$resultado contiene la palabra \"$palabra\"</p>
			</div>
		";
	} else {
		echo "
			<div class='contenedor'>
				<form action='index.php' method='post'>
					<label for='frase'>Introduce una frase: </label><br>
					<input type='text' name='frase' placeholder='Introduce frase...' required>
					<br><br>
					<label for='palabra'>Dame una palabra: </label><br>
					<input type='text' name='palabra' placeholder='Introduce palabra...' required><br><br>
					<input type='submit' name='enviar_datos'>
				</form>
			</div>
		";
	}

	function comprobarPalabra($frase, $palabra)
	{
		$frase_array = explode(" ", $frase);
		if (in_array($palabra, $frase_array)) { 
			return true;
		} else {
			return false;
		}
	}
	?>
</body>
</html>