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
	<title>Insertar empleado</title>
</head>

<body>
	<form action="index.php" method="POST">
		<label for="user">Introduce nombre:</label>
		<input type="text" name="name" id="name" required>
		<label for="age">Introduce edad:</label>
		<input type="number" name="age" max="99" min="18" required><br>
		<input type="submit" value="Enviar">
	</form>
</body>

</html>

<?php

if (isset($_POST["name"]) && isset($_POST["age"])) {
	$nombre = $_POST["name"];
	$edad = $_POST["age"];

	$idAlto = comprobarId();

	if ($idAlto !== false) {
		insertarEmpleado($nombre, $edad, $idAlto);
	}
}

function insertarEmpleado($nombre, $edad, $ultimoId)
{
	global $conn;

	$idFinal = $ultimoId + 1;

	$sql = "INSERT INTO empleados (id, nombre, edad) VALUES (?, ?, ?)";

	$stmt = $conn->prepare($sql);

	if ($stmt === false) {
		echo "Error al preparar la consulta..";
		return false;
	}

	$stmt->bind_param("isi", $idFinal, $nombre, $edad);

	if ($stmt->execute()) {
		echo "Empleado insertado correctamente";
		$conn->close();
		return true;
	} else {
		echo "Error al insertar el empleado";
		$conn->close();
		return false;
	}
}

function comprobarId()
{
	crearConexion();

	global $conn;

	$sql = "SELECT MAX(id) AS idMayor FROM empleados";
	$result = $conn->query($sql);

	if ($result && $result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$conteo = $row["idMayor"];
		return $conteo;
	} else {
		echo "No se pudo obtener el id mas alto";
		$conn->close();
		return false;
	}
}

function crearConexion()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$bdname = "Empresa";
	global $conn;

	//Create Connection

	$conn = new mysqli($servername, $username, $password, $bdname);
	if ($conn->connect_error) {
		die("Conexion fallida: " . $conn->connect_error);
	}
}
?>