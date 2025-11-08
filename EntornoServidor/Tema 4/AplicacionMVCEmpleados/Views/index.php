<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aplicacion MVC Empleados</title>
	<link rel="stylesheet" href="Public/style.css">
</head>

<body>
	<div class="botones-container">
		<h2 style="text-align:center;">Control de empleados</h2>
		<form action="index.php" method="GET">
			<input type="submit" value="Listar Empleados" name="listar">
			<input type="submit" value="Insertar Nuevo" name="insertar">
			<input type="submit" value="Actualizar Empleado" name="actualizar">
		</form>
	</div>

	<?php if (!empty($mensaje)): ?>
		<p style="text-align:center; font-weight: bold; padding: 10px; border: 1px solid; margin: 10px auto; width: 80%;">
			<?php echo htmlspecialchars($mensaje); ?>
		</p>
	<?php endif; ?>

	<div class="datos-container">

		<?php if ($modo === 'listado'): ?>
			<h2 style="text-align:center;">Listado de Empleados</h2>

			<?php if (isset($empleados) && !empty($empleados)): ?>
				<table border="1" style="width:100%; text-align:left; border-collapse: collapse;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Edad</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($empleados as $empleado): ?>
							<tr>
								<td><?php echo htmlspecialchars($empleado['id']); ?></td>
								<td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
								<td><?php echo htmlspecialchars($empleado['edad']); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php else: ?>
				<p style="text-align:center;">No se encontraron empleados para mostrar.</p>
			<?php endif; ?>

		<?php elseif ($modo === 'insercion'): ?>
			<?php include 'formularioInsercion.php'; ?>

		<?php elseif ($modo === 'actualizacion'): ?>
			<?php include 'formularioActualizacion.php'; ?>

		<?php endif; ?>

	</div>
</body>

</html>