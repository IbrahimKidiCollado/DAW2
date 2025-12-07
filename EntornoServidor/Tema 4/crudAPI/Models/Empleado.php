<?php

class Empleado
{
	public $empleados;
	public $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getEmpleados()
	{
		try {
			$sql = "SELECT e.id, e.nombre, e.apellidos, e.edad, e.fecha_alta, e.activo, d.nombre AS departamento,
                        CONCAT(r.nombre, ' ', r.apellidos) AS responsable,
                        GROUP_CONCAT(s.nombre SEPARATOR ', ') AS skills
                    FROM empleado e
                    LEFT JOIN departamento d ON e.id_departamento = d.id
                    LEFT JOIN empleado_skill es ON e.id = es.id_empleado
                    LEFT JOIN skill s ON es.id_skill = s.id
                    LEFT JOIN empleado r ON e.id_responsable = r.id
                    GROUP BY e.id";

			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			die("Error al obtener datos de empleados: " . $e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = "SELECT e.id, e.nombre, e.apellidos, e.edad, e.fecha_alta, e.activo, d.departamento, GROUP_CONCAT(s.nombre SEPARATOR ', ') AS skills
                    FROM empleado e
                    LEFT JOIN departamento d ON e.id_departamento = d.id
                    LEFT JOIN empleado_skill es ON e.id = es.id_empleado
                    LEFT JOIN skill s ON es.id_skill = s.id
                    WHERE e.id = :id
                    GROUP BY e.id";

			$stmt = $this->pdo->prepare($sql);

			$stmt->execute([
				":id" => $id
			]);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			die("Error al listar por id: " . $e->getMessage());
		}
	}

	public function create($data)
	{
		try {
			$sql = "INSERT INTO empleado
					(nombre, apellidos, edad, fecha_alta, activo, id_departamento, id_responsable)
					VALUES
					(:nombre, :apellidos, :edad, :fecha_alta, :activo, :id_departamento, :id_responsable)
					";

			$stmt = $this->pdo->prepare($sql);

			$stmt->execute([
				":nombre" => $data["nombre"],
				":apellidos" => $data["apellidos"],
				":edad" => $data["edad"],
				":fecha_alta" => $data["fecha_alta"],
				":activo" => $data["activo"],
				":id_departamento" => $data["id_departamento"],
				":id_responsable" => $data["id_responsable"]
			]);

			$nuevoId = $this->pdo->lastInsertId();

			return "Empleado creado correctamente";
		} catch (PDOException $e) {
			echo "ERROR al intentar insertar el empleado: ";
			return null;
		}
	}

	public function update($id, $data)
	{
		try {
			$sql = "UPDATE empleado 
					SET 
						nombre = :nombre,
						apellidos = :apellidos,
						edad = :edad,
						fecha_alta = :fecha_alta,
						activo = :activo,
						id_departamento = :id_departamento,
						id_responsable = :id_responsable
					WHERE id = :id";

			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([
				":nombre" => $data["nombre"],
				":apellidos" => $data["apellidos"],
				":edad" => $data["edad"],
				":fecha_alta" => $data["fecha_alta"],
				":activo" => $data["activo"],
				":id_departamento" => $data["id_departamento"],
				":id_responsable" => $data["id_responsable"],
				":id" => $id
			]);

			return "Empleado actualizado correctamente";
		} catch (PDOException $e) {
			die("Error al actualizar datos: " . $e->getMessage());
		}
	}

	public function delete($id)
	{
		try {
			$sql = "DELETE FROM empleado WHERE id = :id";

			$stmt = $this->pdo->prepare($sql);

			$stmt->execute([":id" => $id]);

			if ($stmt->rowCount() == 0)
				return ["message" => "No existe el empleado con id {$id}"];

			return "Empleado eliminado correctamente";
		} catch (PDOException $e) {
			die("Error al eliminar empleado: " . $e->getMessage());
		}
	}
}
?>