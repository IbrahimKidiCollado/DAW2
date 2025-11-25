<?php
class Recurso
{
	private $conn;
	private $table = 'recursos'; // Nombre de tu tabla

	public function __construct($db)
	{
		$this->conn = $db;
	}

	// Método para crear un nuevo recurso
	public function create($data)
	{
		// Uso de placeholders (?) para sentencias preparadas
		$query = 'INSERT INTO ' . $this->table . ' (nombre, descripcion) VALUES (:nombre, :descripcion)';

		$stmt = $this->conn->prepare($query);

		// Sanitación de datos para evitar XSS (aunque es más crucial en vistas, es buena práctica)
		$nombre = htmlspecialchars(strip_tags($data['nombre']));
		$descripcion = htmlspecialchars(strip_tags($data['descripcion']));

		// Asignación de parámetros
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':descripcion', $descripcion);

		if ($stmt->execute()) {
			return true;
		}
		// Imprimir error si es necesario
		printf("Error: %s.\n", $stmt->error);
		return false;
	}

	// Obtener todos los recursos
	public function read()
	{
		$query = 'SELECT id, nombre, descripcion FROM ' . $this->table . ' ORDER BY id DESC';
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener un recurso por id
	public function read_single($id)
	{
		$query = 'SELECT id, nombre, descripcion FROM ' . $this->table . ' WHERE id = :id LIMIT 1';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result ?: null;
	}

	// Actualizar un recurso
	public function update($id, $data)
	{
		$query = 'UPDATE ' . $this->table . ' SET nombre = :nombre, descripcion = :descripcion WHERE id = :id';
		$stmt = $this->conn->prepare($query);

		$nombre = htmlspecialchars(strip_tags($data['nombre'] ?? ''));
		$descripcion = htmlspecialchars(strip_tags($data['descripcion'] ?? ''));

		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':descripcion', $descripcion);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return $stmt->rowCount() > 0;
		}
		return false;
	}

	// Eliminar un recurso
	public function delete($id)
	{
		$query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute()) {
			return $stmt->rowCount() > 0;
		}
		return false;
	}

	// Otros métodos (read, update, delete) seguirían este patrón usando PDO::prepare
	// ...
}
?>