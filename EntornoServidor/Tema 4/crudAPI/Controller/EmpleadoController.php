<?php

require_once "Models/Database.php";
require_once "Models/Empleado.php";
class EmpleadoController
{

	public $bd;
	public $pdo;

	public function apiEmpleados()
	{
		$this->bd = new Database();
		$this->pdo = $this->bd->getConnection();

		header("Content-Type: application/json");
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type");

		$method = $_SERVER["REQUEST_METHOD"];

		$request_uri = $_SERVER["REQUEST_URI"];

		if (preg_match("#/api/empleados(?:/([\w-]+))?/?(?:\?.*)?$#", $request_uri, $matches)) {
			$id = null;
			if (isset($matches[1]))
				$id = $matches[1];

			switch ($method) {
				case "GET":
					$id ? EmpleadoController::getEmpleado($id) : EmpleadoController::getEmpleados();
					break;
				case "POST":
					EmpleadoController::createEmpleado();
					break;
				case "PUT":
					if ($id)
						EmpleadoController::updateEmpleado($id);
					else
						echo json_encode(["error" => "Falta ID"]);
					break;
				case "DELETE":
					if ($id)
						EmpleadoController::deleteEmpleado($id);
					else
						echo json_encode(["error" => "Falta ID"]);
					break;
				default:
					http_response_code(405);
					echo json_encode(["error" => "Metodo no permitido"]);
			}
		} else {
			http_response_code(404);
			echo json_encode(["error" => "Ruta no encontrada"]);
		}
	}


	public function getEmpleado($id)
	{
		$empleado = new Empleado($this->pdo);
		$result = $empleado->getById($id);
		echo json_encode($result);
	}

	public function getEmpleados()
	{
		$empleado = new Empleado($this->pdo);
		$result = $empleado->getEmpleados();
		echo json_encode($result);
	}

	public function createEmpleado()
	{
		$empleado = new Empleado($this->pdo);
		$data = json_decode(file_get_contents("php://input"));
		$result = $empleado->create($data);
		if ($result) {
			echo json_encode($result);
		} else {
			http_response_code(404);
			echo json_encode(["error" => "Usuario no encontrado"]);
		}
	}

	public function updateEmpleado($id)
	{
		$empleado = new Empleado($this->pdo);
		$data = json_decode(file_get_contents("php://input"));
		$result = $empleado->update($id, $data);
		if ($result) {
			echo json_encode($result);
		} else {
			http_response_code(404);
			echo json_encode(["error" => "Usuario no actualizado correctamente"]);
		}
	}

	public function deleteEmpleado($id)
	{
		$empleado = new Empleado($this->pdo);
		$result = $empleado->delete($id);
		if ($result) {
			json_encode($result);
		} else {
			http_response_code(404);
			echo "Error al eliminar el empleado";
		}
	}
}

?>