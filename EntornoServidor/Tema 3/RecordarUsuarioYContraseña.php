<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordar Usuario</title>
    <style>
        input {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php 
    session_start();

    function primerInicio() {
        $usuarioValue = isset($_COOKIE['usuario']);
        $passwordValue = isset($_COOKIE['password']);
        $checked = isset($_COOKIE['usuario']);


        echo <<<HTML
            <h2>Iniciar sesión</h2>
            <form method="post">
                <label for="usuario">Usuario: </label>
                <input type="text" name="usuario" value="$usuarioValue" required><br>
                <label for="password">Contraseña: </label>
                <input type="password" name="password" value="$passwordValue" required><br>
                <input type="checkbox" name="recordar" id="recordar" $checked>
                <label for="recordar">Recordar</label><br>
                <input type="submit" value="Enviar">
            </form>
        HTML;
    }

    function almacenarDatos($usuario, $contraseña, $recordar) {
        $fechaActual = date("Y-m-d");
        $horaActual = date("H:i:s");

        // Guardar en sesión
		
        $_SESSION["usuario"] = $usuario;
        $_SESSION["ultima_fecha"] = $fechaActual;
        $_SESSION["ultima_hora"] = $horaActual;

        // Guardar en cookies si se marcó "recordar"
        if ($recordar) {
            setcookie("usuario", $usuario, time() + 7776000, "/");
            setcookie("password", $contraseña, time() + 7776000, "/");
        } else {
            // Eliminar cookies si no quiere recordar
            setcookie("usuario", "", time() - 3600, "/");
            setcookie("password", "", time() - 3600, "/");
        }
    }

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario'])) {
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["password"];
        $recordar = isset($_POST["recordar"]);
        
        almacenarDatos($usuario, $contraseña, $recordar);
		
        echo <<<HTML
            <p>Hola {$_SESSION['usuario']}, su última visita fue el {$_SESSION['ultima_fecha']} a las {$_SESSION['ultima_hora']}</p>
            <form method="post">
                <input type="submit" name="salir" value="Salir">
            </form>
        HTML;
        
    } elseif (isset($_POST['salir'])) {
        // Cerrar sesión
        session_destroy();
        setcookie("usuario", "", time() - 3600, "/");
        setcookie("password", "", time() - 3600, "/");
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
		if (array_key_exists('usuario', $_COOKIE)) {
			echo <<<HTML
            <p>Hola {$_SESSION['usuario']}, su última visita fue el {$_SESSION['ultima_fecha']} a las {$_SESSION['ultima_hora']}</p>
            <form method="post">
                <input type="submit" name="salir" value="Salir">
            </form>
        HTML;
		} else {
			primerInicio();
		}
}
    ?>
</body>
</html>