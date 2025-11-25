<?php
class RecursoController
{
	private $model;

	public function __construct($db)
	{
		// Asume que ya se instanció el Recurso model con la conexión $db
		$this->model = new Recurso($db);
	}

	public function store()
	{
		// 1. Leer el JSON de la petición
		$data = json_decode(file_get_contents("php://input"), true);

		// 2. Validación básica (en un sistema real sería más robusta)
		if (!isset($data['nombre']) || !isset($data['descripcion'])) {
			$this->respond(400, ['message' => 'Faltan campos obligatorios.']);
			return;
		}

		// 3. Llamar al modelo para crear el registro
		if ($this->model->create($data)) {
			$this->respond(201, ['message' => 'Recurso creado exitosamente.']);
		} else {
			$this->respond(503, ['message' => 'Error al crear recurso en la BD.']);
		}
	}

	public function index()
	{
		$items = $this->model->read();
		$this->respond(200, ['data' => $items]);
	}

	public function show($id)
	{
		$item = $this->model->read_single((int) $id);
		if ($item) {
			$this->respond(200, $item);
		} else {
			$this->respond(404, ['message' => 'Recurso no encontrado.']);
		}
	}

	public function update($id)
	{
		$data = json_decode(file_get_contents("php://input"), true);
		if (!$data) {
			$this->respond(400, ['message' => 'JSON inválido o vacío.']);
		}

		$ok = $this->model->update((int) $id, $data);
		if ($ok) {
			$this->respond(200, ['message' => 'Recurso actualizado.']);
		} else {
			$this->respond(404, ['message' => 'Recurso no encontrado o sin cambios.']);
		}
	}

	public function destroy($id)
	{
		$ok = $this->model->delete((int) $id);
		if ($ok) {
			$this->respond(200, ['message' => 'Recurso eliminado.']);
		} else {
			$this->respond(404, ['message' => 'Recurso no encontrado.']);
		}
	}

	// Función de ayuda para estandarizar las respuestas
	private function respond(int $code, array $data)
	{
		header("Content-Type: application/json");
		http_response_code($code);
		echo json_encode($data);
		exit();
	}
}
?>