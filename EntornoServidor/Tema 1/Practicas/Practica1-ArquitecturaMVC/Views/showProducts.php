<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="Views/CSS/styles.css">
	<title>Catálogo de productos</title>
</head>

<body>
	<h1>Catálogo de productos</h1>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th class="precio">Precio (€)</th>
				<th class="stock">Stock</th>
				<th>Categoría</th>
				<th>Fecha creación</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($productos as $producto) {
				echo "
				<tr>	
					<td>{$producto['id']}</td>
					<td class='imagen'><img src='{$producto['url_img']}' alt='{$producto['nombre']}'></td>
					<td>{$producto['nombre']} </td>
					<td class='descripcion'> {$producto['descripcion']} </td>
					<td class='precio'>{$producto['precio']}</td>
					<td class='stock'>{$producto['stock']}</td>
					<td class='categoria'>{$producto['categoria']}</td>
					<td>{$producto['fecha_creacion']}</td>
				</tr>
				";
			}
			?>
		</tbody>
	</table>
</body>

</html>