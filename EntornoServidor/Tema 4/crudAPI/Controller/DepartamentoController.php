<?php

require_once "Models/Database.php";
require_once "Models/Departamento.php";

class DepartamentoController
{

	public $bd;
	public $pdo;

	public function apiDepartamento()
	{
		$this->bd = new Database();
		$this->pdo = $this->bd->getConnection();

		header("Content-Type: application/json");
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type");

		$method = $_SERVER["REQUEST_METHOD"];

		$request_uri = $_SERVER["REQUEST_URI"];

		if (preg_match("#/api/departamentos(?:/([\w-]+))?/?(?:\?.*)?$#", $request_uri, $matches)) {
			$id = null;
			if (isset($matches[1]))
				$id = $matches[1];

			switch ($method) {
				case "GET":
					$id ? DepartamentoController::getDepartamento($id) : DepartamentoController::getDepartamentos();
					break;
				case "POST":
					DepartamentoController::createDepartamento();
					break;
				case "PUT":
					if ($id)
						DepartamentoController::updateDepartamento($id);
					else
						echo json_encode(["error" => "Falta ID"]);
					break;
				case "DELETE":
					if ($id)
						DepartamentoController::deleteDepartamento($id);
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

	public function getDepartamentos()
	{
		$departamento = new Departamento($this->pdo);
		$result = $departamento->getDepartamentos();
		echo json_encode($result);
	}

	public function getDepartamento($id)
	{
		$departamento = new Departamento($this->pdo);
		$result = $departamento->getById($id);
		echo json_encode($result);
	}

	public function createDepartamento()
	{
		$departamento = new Departamento($this->pdo);
		$data = json_decode(file_get_contents("php://input"));
		$result = $departamento->create($data);
		if ($result) {
			$departamento->create($data);
		} else {
			http_response_code(404);
			echo json_encode(["error" => "Error al crear departamento"]);
		}
	}

	public function updateDepartamento($id)
	{
		$departamento = new Departamento($this->pdo);
		$data = json_decode(file_get_contents("php://input"));
		$result = $departamento->update($id, $data);
		if ($result) {
			echo json_encode($result);
		} else {
			http_response_code(404);
			echo json_encode(["error" => "Error al actualizar departamento"]);
		}
	}

	public function deleteDepartamento($id)
	{
		$departamento = new Departamento($this->pdo);
		$result = $departamento->delete($id);
		if ($result) {
			echo json_encode($result);
		} else {
			http_response_code(404);
			echo json_encode(["error" => "Error al eliminar departamento"]);
		}
	}
}
?>