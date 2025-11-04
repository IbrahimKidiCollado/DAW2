<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion de Proyectos</title>
	<link rel="stylesheet" href="../css/styles.css">
</head>

<!--  -->

<body>
	<header>
		<div class="titleContainer">
			<img src="../imgs/carpeta.png" alt="logo" class="logo">
			<h2 class="title">Gestor de Proyectos</h2>
		</div>
		<button class="botonNuevoProyecto">+ Nuevo Proyecto</button>
	</header>
	<main class="main-container">
		<section class="filtroContainer">
			<div class="textoFiltro">
				<img class="imagenFiltro" src="../imgs/filtrar.png" alt="imagenFiltro">
				<p>Filtros de busqueda</p>
			</div>
			<div class="filtros">
				<div>
					<label for="Nombre del proyecto" class="FiltrosTitulos">Nombre del Proyecto</label>
					<input type="text" placeholder="🔍Buscar por nombre...">
				</div>
				<div>
					<label for="tipo">Tipo de Proyecto</label>
					<select name="tipoProyecto" id="tipoProyecto">
						<option value="todas">Todas</option>
						<option value="interno">Proyecto interno</option>
						<option value="consultoria">Consultoria</option>
						<option value="RRHH">Iniciativa RRHH</option>
					</select>
				</div>
				<div>
					<label for="tecnologias">Tecnologias</label>
					<select name="tecnologia" id="tecnologia">
						<option value="todas">Todas</option>
						<option value="react">React</option>
						<option value="vue">Vue.js</option>
						<option value="angular">Angular</option>
						<option value="node">Node.js</option>
						<option value="mariaDB">MariaDB</option>
						<option value="laravel">Laravel</option>
						<option value="mysql">MySQL</option>
						<option value="php">PHP</option>
						<option value="jquery">Jquery</option>
						<option value="bootstrap">Boostrap</option>
						<option value="symfony">Symfony</option>
						<option value="chart.js">Chart.js</option>
						<option value="codeIgniter">CodeIgniter</option>
						<option value="postgreSQL">PostgreSQL</option>
					</select>
				</div>
				<div>
					<label for="estado">Estado</label>
					<select name="estado" id="estado">
						<option value="todos">Todos los estados</option>
						<option value="progreso">En progreso</option>
						<option value="pendiete">Pendiente</option>
						<option value="finalizado">Finalizado</option>
						<option value="bloqueado">Bloqueado</option>
					</select>
				</div>
			</div>
			<div class="butonContainer">
				<button class="botonLimpiar">Limpiar Filtros</button>
				<button class="botonFiltros">Aplicar filtros</button>
			</div>
		</section>
		<section class="contenido-container">
			<table>
				<caption style="text-align:left;">Lista de Proyectos</caption>
				<thead>
					<th>NOMBRE</th>
					<th>DESCRIPCION</th>
					<th>TIPO</th>
					<th>TECNOLOGIAS</th>
					<th>ESTADO</th>
				</thead>
				<tr>
					<td>E-commerce Platform</td>
					<td>Plataforma completa de comercio electronico</td>
					<td><button>Contenido</button></td>
					<td>
						<button>contenido</button><button>Contenido</button><button>contenido-container</button><button>Contenido</button>
					</td>
					<td>
						<button>Contenido</button>
					</td>
				</tr>
			</table>
		</section>
	</main>
</body>

</html>