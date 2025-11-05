<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ENTORNO_SERVIDOR";

$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";


try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM EMPLEADOS";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    // Listar todos los empleados
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultado) > 0) {
        echo "<h1>Lista de empleados</h1>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                </tr>";

        foreach ($resultado as $fila) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['edad']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo " No hay empleados registrados.";
    }


} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $pdo = null;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <button id="crearEmpleado">
        <a href="../FormulariosBBDD/index.php">Crear empleado</a>
    </button>

</body>

</html>