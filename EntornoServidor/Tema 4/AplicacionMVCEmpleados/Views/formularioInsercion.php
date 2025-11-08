<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./Public/style.css">
	<title></title>
</head>

<body>
	<h2 style="text-align:center;">Insertar Nuevo Empleado</h2>
	<form action="../Controller/cont.php" method="POST"
		style="max-width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ccc;">
		<input type="hidden" name="accion" value="guardar_insercion">

		<label for="nombre">Nombre:</label><br>
		<input type="text" id="nombre" name="nombre" required
			style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

		<label for="edad">Edad:</label><br>
		<input type="number" id="edad" name="edad" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

		<input type="submit" value="Guardar Empleado"
			style="padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
	</form>
</body>

</html>