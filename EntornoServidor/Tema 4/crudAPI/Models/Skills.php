<?php

class Skills
{
	public $skills;
	public $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getSkills()
	{
		try {
			$sql = "SELECT id,nombre FROM skill";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			die("Error al listar skills: " . $e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = "SELECT id,nombre FROM skill WHERE id=:id";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([":id" => $id]);

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			die("Error al listar skills por id: " . $e->getMessage());
		}
	}

	public function create($data)
	{
		try {
			$sql = "INSERT INTO skill (nombre) VALUES (:nombre)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([":nombre" => $data->nombre]);

			$nuevoId = $this->pdo->lastInsertId();

			return "Skill creada con id {$nuevoId}";
		} catch (PDOException $e) {
			die("Error al crear skill: " . $e->getMessage());
		}
	}

	public function update($id, $data)
	{
		try {
			$sql = "UPDATE skill SET nombre = :nombre WHERE id=:id";

			$stmt = $this->pdo->prepare($sql);

			$stmt->execute([
				":nombre" => $data["nombre"],
				":id" => $id
			]);

			return "Skill actualizada correctamente";
		} catch (PDOException $e) {
			die("Error al actualizar skills: " . $e->getMessage());
		}
	}

	public function delete($id)
	{
		try {
			$sql = "DELETE FROM skill WHERE id = :id";

			$stmt = $this->pdo->prepare($sql);

			$stmt->execute([":id" => $id]);

			if ($stmt->rowCount() == 0) {
				return ["message" => "No existe la skill con id {$id}"];
			}
			return "Skill eliminada correctamente";
		} catch (PDOException $e) {
			die("Error al eliminar la skill: " . $e->getMessage());
		}
	}

}

?>