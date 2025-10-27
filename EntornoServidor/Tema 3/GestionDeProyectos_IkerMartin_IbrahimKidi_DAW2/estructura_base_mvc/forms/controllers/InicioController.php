<?php

require_once __DIR__ . '/../models/ProyectosModel.php';

class InicioController
{
    function mostrarTecnologias($tecnologias)
    {
        $lista = implode(',', $tecnologias);
        $codigo = '<div class= "tecnologias">';
        foreach ($tecnologias as $elemento) {
            $codigo .= '<p>' . $elemento . '</p>';
        }
        $codigo .= '</div>';


        return $codigo;
    }

    function mostrarProyectos($proyectos)
    {
        $codigo = '
            <strong class="nombre">' . $proyectos['nombre'] . '</strong>
            <p class="descripcion">' . $proyectos['descripcion'] . '</p>
            <p class="tipo">' . $proyectos['tipo'] . '</p>
            ' . $this->mostrarTecnologias($proyectos['tecnologias']) . '
            <p class="estado ' . strtolower($proyectos['estado']) . '">' . $proyectos['estado'] . '</p>
        ';
        return $codigo;
    }
    public function index()
    {
        if (array_key_exists("msg", $_GET)) {
            $message = $_GET["msg"];
        } else {
            $message = "¡Hola desde el HomeController!";
        }

        $tipoXdefecto = 'TodosLosProyectos';
        $estadoXdefecto = 'TodosLosEstados';
        $tecnologiaXdefecto = 'TodasLasTecnologias';
        $nombreXdefecto = '';


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['TipoProyecto'] ?? $tipoXdefecto;
            $estado = $_POST['Estado'] ?? $estadoXdefecto;
            $tecnologia = $_POST['Tecnologias'] ?? $tecnologiaXdefecto;
            $nombre = $_POST['buscarPorNombre'] ?? $nombreXdefecto;
        } else {
            $tipo = $tipoXdefecto;
            $estado = $estadoXdefecto;
            $tecnologia = $tecnologiaXdefecto;
            $nombre = $nombreXdefecto;
        }

        $proyectos = ProyectosModel::getProyectos();
        $proyectosFiltrados = array_filter($proyectos, function ($comprobar) use ($tipo, $estado, $tecnologia, $nombre) {
            $condicion = true;

            if ($tipo != 'TodosLosProyectos') {
                $condicion = $condicion && (strtolower(str_replace(' ', '', $comprobar['tipo']))) === strtolower($tipo);
            }

            if ($estado != 'TodosLosEstados') {
                $condicion = $condicion && (strtolower(str_replace(' ', '', $comprobar['estado']))) === strtolower($estado);
            }

            if ($tecnologia != 'TodasLasTecnologias') {
                $condicion = $condicion && in_array($tecnologia, $comprobar['tecnologias']);
            }

            if ($nombre != '') {
                $condicion = $condicion && (stripos($comprobar['nombre'], $nombre) !== false);
            }
            return $condicion;
        });

        require_once 'views/inicio.php';
    }


    public function procesarDatos()
    {
        var_dump($_GET);
    }
}