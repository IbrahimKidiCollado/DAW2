<?php

require('Model/conexion.php');

$con = new Conexion();

$productos = $con->getProducts();

require('Views/showProducts.php');

?>