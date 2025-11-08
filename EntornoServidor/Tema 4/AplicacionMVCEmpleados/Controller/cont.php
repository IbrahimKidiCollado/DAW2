<?php
// Controller/cont.php

// Define la ruta base para la raíz del proyecto (sube un nivel desde Controller)
$base_dir = __DIR__ . '/../';

// 1. INCLUSIONES NECESARIAS (Usando ruta absoluta)
// NOTA: Asumo que el nombre real del archivo es 'accessBBDD.php' (todo minúsculas)
require_once($base_dir . 'Model/accessBBDD.php');

// 2. INICIALIZACIÓN
$model = new AccessBBDD();
$empleados = null;
$mensaje = '';
$modo = '';


// --- 3. MANEJO DE PETICIONES (ROUTING) ---

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$accion = $_POST['accion'] ?? '';

	if ($accion === 'guardar_insercion') {

		$nombre = trim($_POST['nombre'] ?? '');
		$edad = intval($_POST['edad'] ?? 0);

		if (!empty($nombre) && $edad > 18) {

			if ($model->insertarEmpleado($nombre, $edad)) {
				$mensaje = '✅ Empleado insertado con éxito.';
				$modo = 'listado';
				$empleados = $model->listarEmpleados();
			} else {
				$mensaje = '❌ Error al insertar el empleado en la BBDD.';
				$modo = 'insercion';
			}
		} else {
			$mensaje = '⚠️ Datos inválidos: El nombre es requerido y la edad debe ser > 18.';
			$modo = 'insercion';
		}

	} elseif ($accion === 'guardar_actualizacion') {

		$id = intval($_POST['id'] ?? 0);
		$nombre = trim($_POST['nombre'] ?? '');
		$edad = intval($_POST['edad'] ?? 0);

		if ($id > 0 && !empty($nombre) && $edad > 18) {
			if ($model->modificarEmpleado($nombre, $edad, $id)) {
				$mensaje = '✅ Empleado actualizado con éxito.';
			} else {
				$mensaje = '❌ Error al actualizar el empleado (ID no encontrado o error BBDD).';
			}
			$modo = 'listado';
			$empleados = $model->listarEmpleados();
		} else {
			$mensaje = '⚠️ Datos inválidos para actualización.';
			$modo = 'actualizacion';
		}
	}

} else {

	if (isset($_GET['listar'])) {
		$empleados = $model->listarEmpleados();
		$modo = 'listado';

	} elseif (isset($_GET['insertar'])) {
		$modo = 'insercion';

	} elseif (isset($_GET['actualizar'])) {
		$modo = 'actualizacion';

	} else {
		// ACCIÓN POR DEFECTO: Mostrar Listado
		$empleados = $model->listarEmpleados();
		$modo = 'listado';
	}
}


// 4. CARGA FINAL DE LA VISTA (Usando la ruta base)
include($base_dir . 'Views/index.php');
?>