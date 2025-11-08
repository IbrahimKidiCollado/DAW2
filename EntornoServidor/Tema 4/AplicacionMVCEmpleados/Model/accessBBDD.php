<?php
class AccessBBDD
{
	private $hostName = "localhost";
	private $password = "";
	private $username = "root";
	private $dbName = "Empresa";
	private $charset = "utf8mb4";
	private $conn;

	public function __construct()
	{
		try {
			$dsn = "mysql:host=" . $this->hostName . ";dbname=" . $this->dbName . ";charset=" . $this->charset;

			// 1. Asignamos la conexión a la propiedad de la clase
			$this->conn = new PDO($dsn, $this->username, $this->password);

			// 2. Configurar el manejo de errores
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e) {
			// En un Model, mejor registrar el error y finalizar o lanzar una excepción.
			die("Error de conexión a la BBDD: " . $e->getMessage());
		}
	}

	public function listarEmpleados()
	{
		try {
			$sql = "SELECT id, nombre, edad FROM empleados";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $resultados;

		} catch (PDOException $e) {
			error_log("Error al listar empleados: " . $e->getMessage());
			return [];
		}
	}
	public function modificarEmpleado($name, $age, $id)
	{
		try {
			$sql = "UPDATE empleados SET nombre = ?, edad = ? WHERE id = ?";

			$stmt = $this->conn->prepare($sql);

			return $stmt->execute([$name, $age, $id]);
		} catch (PDOException $e) {
			echo "Error al actualizar: " . $e->getMessage();
		}
	}

	public function insertarEmpleado($nombre, $edad)
	{
		try {
			$id = $this->obtenerUltimoId() + 1;
			$sql = "INSERT INTO empleados (id, nombre, edad) VALUES (?, ?, ?)";
			$stmt = $this->conn->prepare($sql);

			$stmt->execute([$id, $nombre, $edad]);

			if ($stmt->execute()) {
				return true;
			} else {
				echo "Error al insertar el empleado";
				return false;
			}

		} catch (PDOException $e) {
			echo "Erorr al insertar empleado: " . $e->getMessage();
		}
	}

	private function obtenerUltimoId()
	{
		try {
			$sql = "SELECT MAX(id) AS idMayor FROM empleados";
			$result = $this->conn->query($sql);

			$row = $result->fetch(PDO::FETCH_ASSOC);
			$idAlto = $row["idMayor"];
			return $idAlto;
		} catch (PDOException $e) {
			echo "Error al encontrar el id mas alto: " . $e->getMessage();
		}
	}
}

?>