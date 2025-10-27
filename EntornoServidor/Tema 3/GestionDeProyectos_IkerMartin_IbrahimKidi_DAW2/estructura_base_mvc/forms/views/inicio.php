<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="public/css/style.css" />
    <!-- <script src="../public/js/main.js"></script> -->
</head>

<body>
    <header>
        <img id="carpeta" src="public/img/carpeta.jpg" alt="Icono de carpeta">
        <h1>Gestor de Proyectos</h1>
        <button><b>+ Nuevo Proyecto</b></button>
    </header>

    <main>
        <!-- Filtro de proyectos -->
        <form class="filtroContainer" method="POST" action="index.php">
            <div id="filtro">
                <h2>Filtrar Proyectos</h2>

                <div id="categorias">
                    <div>
                        <label for="buscarPorNombre">Nombre del Proyecto</label>
                        <input type="text" id="buscarPorNombre" name="buscarPorNombre"
                            placeholder="🔍 Buscar por nombre...">
                    </div>

                    <div>
                        <label for="TipoProyecto">Tipo</label>
                        <select name="TipoProyecto" id="TipoProyecto" onchange="doSomething()">
                            <option value="TodosLosProyectos">Todos Los Proyectos</option>
                            <option value="ProyectoInterno">Proyecto Interno</option>
                            <option value="Consultoría">Consultoría</option>
                            <option value="IniciativaRRHH">Iniciativa RRHH</option>
                        </select>
                    </div>

                    <div>
                        <label for="Tecnologias">Tecnologías</label>
                        <select name="Tecnologias" id="Tecnologias" onchange="doSomething()">
                            <option value="TodasLasTecnologias">Todas Las Tecnologías</option>
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="MySQL">MySQL</option>
                            <option value="Bootstrap">Bootstrap</option>
                            <option value="Symfony">Symfony</option>
                            <option value="MariaDB">MariaDB</option>
                            <option value="PostgreSQL">PostgreSQL</option>
                            <option value="Vuejs">Vue.js</option>
                            <option value="Chartjs">Chart.js</option>
                            <option value="CodeIgniter">CodeIgniter</option>
                            <option value="jQuery">jQuery</option>
                            <option value="TailwindCSS">Tailwind CSS</option>
                        </select>
                    </div>

                    <div>
                        <label for="Estado">Estado</label>
                        <select name="Estado" id="Estado" onchange="doSomething()">
                            <option value="TodosLosEstados">Todos Los Estados</option>
                            <option value="EnProgreso">En progreso</option>
                            <option value="Bloqueado">Bloqueado</option>
                            <option value="Finalizado">Finalizado</option>
                            <option value="Pendiente">Pendiente</option>
                        </select>
                    </div>
                </div>

                <div id="resultados">
                    <?php
                    echo '<p>Se han encontrado ' . count($proyectosFiltrados) . ' proyectos</p>';
                    ?>
                    <div>
                        <button id="aplicar" type="submit">Aplicar Filtros</button>
                        <button id="limpiar" type="button" onclick="window.location.href='index.php';">↺ Limpiar
                            Filtros</button>

                    </div>
                </div>
            </div>
        </form>

        <!-- Listado dinámico de proyectos -->
        <section class="proyectos">
            <?php
            foreach ($proyectosFiltrados as $proyecto) {
                echo '<div class="proyecto">';
                echo $this->mostrarProyectos($proyecto);
                echo '</div>';
            }

            ?>

        </section>
    </main>
</body>

</html>