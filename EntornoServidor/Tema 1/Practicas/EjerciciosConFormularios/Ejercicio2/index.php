<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles.css">
	<title>Ejercicio 2</title>
</head>
<body>
		<?php 
			if (array_key_exists('zona_horaria', $_POST)) {
				$zona = $_POST['zona_horaria'];
				$resultado = obtenerHora($zona);
				echo "<div class='contenedor'><p>La fecha en $zona es: $resultado</p></div>";
			} else {
				echo '
					<div class="contenedor">
						<form action="index.php" method="POST">
							<select name="zona_horaria" id="zona_horaria">
								<option value="">Selecciona una zona horaria</option>
								<option value="America/New_York">(UTC-05:00) Eastern Time - New York, Toronto</option>
								<option value="America/Los_Angeles">(UTC-08:00) Pacific Time - Los Angeles, Vancouver</option>
								<option value="America/Mexico_City">(UTC-06:00) Central Time - Ciudad de México, Chicago</option>
								<option value="Europe/London">(UTC+00:00) Greenwich Mean Time - London, Dublin</option>
								<option value="Europe/Paris">(UTC+01:00) Central European Time - Paris, Madrid, Rome</option>
								<option value="Europe/Moscow">(UTC+03:00) Moscow Time - Moscow, Istanbul</option>
								<option value="Asia/Dubai">(UTC+04:00) Gulf Standard Time - Dubai, Abu Dhabi</option>
								<option value="Asia/Shanghai">(UTC+08:00) China Time - Beijing, Shanghai, Singapore</option>
								<option value="Asia/Tokyo">(UTC+09:00) Japan Time - Tokyo, Seoul</option>
								<option value="Australia/Sydney">(UTC+10:00) Eastern Australia - Sydney, Melbourne</option>
							</select>
							<input type="submit" value="Enviar">
						</form>
					</div>
				';
			}
			function obtenerHora($zona) {
				date_default_timezone_set($zona);
				return date('d-m-Y H:i:s');
			}
		?>
	
	
</body>
</html>