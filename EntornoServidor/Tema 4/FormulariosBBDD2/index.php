<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		label {
			display: block;
			margin-top: 20px;
			margin-bottom: 10px;
		}

		form {
			background-color: pink;
			text-align: center;

			width: fit-content;
			padding: 30px;
			margin: 60px auto;
		}

		input {
			display: block;
			margin: 0 auto;
		}
	</style>
	<title>Editar Empleado</title>
</head>

<body>
	<form action="index.php" method="POST">
		<label for="user">Introduce nombre:</label>
		<input type="text" name="name" id="name" required>
		<label for="age">Introduce edad:</label>
		<input type="number" name="age" max="99" min="18" required><br>
		<label for="id">Introduce id:</label>
		<input type="number" name="id" id="id"><br>
		<input type="submit" value="Enviar">
	</form>
</body>

</html>

<?php

if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["id"])) {
	$nombre = $_POST["name"];
	$edad = $_POST["age"];
	$id = $_POST["id"];

	cambiarEmpleado($nombre, $edad, $id);
}

function cambiarEmpleado($nombre, $edad, $id)
{
	crearConexion();

	global $conn;

	$sql = "UPDATE empleados SET nombre = ?, edad = ? WHERE id = ?";

	$stmt = $conn->prepare($sql);

	$stmt->bind_param("sii", $nombre, $edad, $id);

	if ($stmt->execute()) {
		if ($stmt->affected_rows > 0) {
			echo "Empleado modificado correctamente";
			$stmt->close();
			return true;
		} else {
			echo "El id no existe";
			$stmt->close();
			return false;
		}
	} else {
		echo "Error al ejecutar la actualización";
		$stmt->close();
		return false;
	}
}
function crearConexion()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$bdname = "empresa";
	global $conn;

	//Create Connection

	$conn = new mysqli($servername, $username, $password, $bdname);
	if ($conn->connect_error) {
		die("Conexion fallida: " . $conn->connect_error);
	}
}
?>