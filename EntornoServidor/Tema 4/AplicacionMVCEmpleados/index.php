<?php
// index.php (Punto de entrada de la aplicación)

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ejecuta el Controller principal, delegando el control.
require_once './Controller/cont.php';
?>