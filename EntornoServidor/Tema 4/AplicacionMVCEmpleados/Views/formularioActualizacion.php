<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="./Public/style.css">
</head>

<body>

</body>

</html>

<h2 style="text-align:center;">Actualizar Empleado</h2>
<form action="../Controller/cont.php" method="POST"
	style="max-width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ccc;">
	<input type="hidden" name="accion" value="guardar_actualizacion">

	<label for="id">ID del Empleado a Actualizar:</label><br>
	<input type="number" id="id" name="id" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

	<label for="nombre">Nuevo Nombre:</label><br>
	<input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

	<label for="edad">Nueva Edad:</label><br>
	<input type="number" id="edad" name="edad" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

	<input type="submit" value="Actualizar Datos"
		style="padding: 10px 15px; background-color: #008CBA; color: white; border: none; cursor: pointer;">
</form>