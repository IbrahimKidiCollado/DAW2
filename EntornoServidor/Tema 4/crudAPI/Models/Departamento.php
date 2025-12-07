<?php

class Departamento
{
	public $departamentos;
	public $pdo;
	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getDepartamentos()
	{
		try {
			$sql = "SELECT id,nombre FROM departamento";

			$stmt = $this->pdo->prepare($sql);

			$stmt->excute();

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			die("Error al listar departamentos: " . $e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = "SELECT id,nombre FROM departamento WHERE id=:id";

			$stmt = $this->pdo->prepare($sql);

			$stmt->execute([":id" => $id]);

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			die("Error al mostrar departamento por id: " . $e->getMessage());
		}
	}

	public function create($data)
	{
		try {
			$sql = "INSERT INTO departamento (nombre) VALUES (:nombre)";

			$stmt = $this->pdo->prepare($sql);

			$stmt->execute([":nombre" => $data->nombre]);

			$ultimoId = $this->pdo->lastInsertId();

			return "Departamento creado correctamente con id: {$ultimoId}";
		} catch (PDOException $e) {
			die("Error al crear departamento: " . $e->getMessage());
		}
	}

	public function update($id, $data)
	{
		try {
			$sql = "UPDATE departamento SET nombre = :nombre WHERE id = :id";

			$stmt = $this->pdo->prepare($sql);

			$stmt->execute([
				":nombre" => $data->nombre,
				":id" => $id
			]);

			return "Departamento con id {$id} actualizado";
		} catch (PDOException $e) {
			die("Error al actualizar departamento: " . $e->getMessage());
		}
	}

	public function delete($id)
	{
		try {
			$sql = "DELETE FROM departamento WHERE id = :id";

			$stmt = $this->pdo->prepare($sql);

			$stmt->execute([":id" => $id]);

			if ($stmt->rowCount() == 0)
				return "No existe el departamento con id {$id}";

			return "Departamento con id {$id} borrado correctamente";
		} catch (PDOException $e) {
			die("Error al eliminar el departamento: " . $e->getMessage());
		}
	}
}

?>