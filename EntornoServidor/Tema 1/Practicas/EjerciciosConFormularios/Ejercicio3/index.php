<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
    if (array_key_exists('elegir_tipo', $_POST)) {
        $decision = $_POST['elegir_tipo'];
        
        // Mostrar formulario para ingresar la fecha
        echo "
        <div class='contenedor'>
            <form action='index.php' method='post'>
                <input type='hidden' name='decision' value='$decision'>
                <label for='number'>Dame la fecha en formato \"$decision\": </label><br><br>
                <input type='text' name='number' required>
                <input type='submit' value='Enviar'>
            </form>
        </div>
        ";
        
    } elseif (array_key_exists("number", $_POST)) {
        // Procesar la conversión cuando se envía el número
        $number = $_POST["number"];
        $decision = $_POST["decision"];
        $resultado = convertir($number, $decision);
        
        echo "
        <div class='contenedor'>
            <p>El resultado es: $resultado</p>
            <p><a href='index.php'>← Volver a elegir</a></p>
        </div>
        ";
        
    } else {
        // Mostrar formulario inicial
        echo '
        <div class="contenedor">
            <form action="index.php" method="post">
                <select name="elegir_tipo">
                    <option value="epoch">Epoch → Fecha</option>
                    <option value="fecha">Fecha → Epoch</option>
                </select><br><br>	
                <input type="submit" value="Enviar">
            </form>
        </div>
        ';
    }

    function convertir($tiempo, $tipo) {
        if ($tipo === 'epoch') {
            // Convertir Epoch → Fecha
            $fecha = new DateTime();
            $fecha->setTimestamp($tiempo);
            $zona = new DateTimeZone('Europe/Madrid');
            $fecha->setTimezone($zona);
            return $fecha->format('d/m/Y H:i:s');
        } else {
            // Convertir Fecha → Epoch
            return strtotime($tiempo);
        }
    }
    ?>
</body>
</html>