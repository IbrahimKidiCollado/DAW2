<?php

require_once "Models/Database.php";
require_once "Models/Skills.php";
class SkillsController
{

	public $bd;
	public $pdo;

	public function apiSkills()
	{
		$this->bd = new Database();
		$this->pdo = $this->bd->getConnection();

		header("Content-Type: application/json");
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type");

		$method = $_SERVER["REQUEST_METHOD"];

		$request_uri = $_SERVER["REQUEST_URI"];

		if (preg_match("#/api/skills(?:/([\w-]+))?/?(?:\?.*)?$#", $request_uri, $matches)) {
			$id = null;
			if (isset($matches[1]))
				$id = $matches[1];

			switch ($method) {
				case "GET":
					$id ? SkillsController::getSkill($id) : SkillsController::getSkills();
					break;
				case "POST":
					SkillsController::createSkill();
					break;
				case "PUT":
					if ($id)
						SkillsController::updateSkill($id);
					else
						echo json_encode(["error" => "Falta ID"]);
					break;
				case "DELETE":
					if ($id)
						SkillsController::deleteSkill($id);
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


	public function getSkill($id)
	{
		$skill = new Skills($this->pdo);
		$result = $skill->getById($id);
		echo json_encode($result);
	}

	public function getSkills()
	{
		$skill = new Skills($this->pdo);
		$result = $skill->getSkills();
		echo json_encode($result);
	}

	public function createSkill()
	{
		$skill = new Skills($this->pdo);
		$data = json_decode(file_get_contents("php://input"));
		$result = $skill->create($data);
		if ($result) {
			echo json_encode($result);
		} else {
			http_response_code(404);
			echo json_encode(["error" => "skill no encontrada"]);
		}
	}

	public function updateSkill($id)
	{
		$skill = new Skills($this->pdo);
		$data = json_decode(file_get_contents("php://input"));
		$result = $skill->update($id, $data);
		if ($result) {
			echo json_encode($result);
		} else {
			http_response_code(404);
			echo json_encode(["error" => "skill no actualizada"]);
		}
	}

	public function deleteSkill($id)
	{
		$skill = new Skills($this->pdo);
		$result = $skill->delete($id);
		if ($result) {
			echo json_encode($result);
		} else {
			http_response_code(404);
			echo json_encode(["error" => "skill no eliminada"]);
		}
	}
}

?>