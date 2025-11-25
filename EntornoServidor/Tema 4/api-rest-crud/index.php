<?php

require_once 'core/Database.php';
require_once 'models/Recurso.php';
require_once 'controllers/RecursoController.php';

$database = new Database();
$db = $database->connect();

$controller = new RecursoController($db);

// --- Lógica del Router ---
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$uri_segments = explode('/', trim($uri, '/'));


if (isset($uri_segments[0]) && $uri_segments[0] === 'recursos') {
	switch ($method) {
		case 'GET':

			if (isset($uri_segments[1])) {
				$controller->show($uri_segments[1]);
			} else {
				$controller->index();
			}
			break;
		case 'POST':
			$controller->store();
			break;
		case 'PUT':
			if (isset($uri_segments[1])) {
				$controller->update($uri_segments[1]);
			} else {
				http_response_code(400);
				echo json_encode(['message' => 'Falta ID para actualizar.']);
			}
			break;
		case 'DELETE':
			if (isset($uri_segments[1])) {
				$controller->destroy($uri_segments[1]);
			} else {
				http_response_code(400);
				echo json_encode(['message' => 'Falta ID para eliminar.']);
			}
			break;
		default:

			header("Allow: GET, POST, PUT, DELETE");
			http_response_code(405);
			echo json_encode(['message' => 'Método no permitido.']);
			break;
	}
} else {

	http_response_code(404);
	echo json_encode(['message' => 'Recurso no encontrado.']);
}
?>