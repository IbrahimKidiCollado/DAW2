<?php
class Conexion {
    private $conexion;
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $bd = "tienda";

    public function __construct() {
        // Establecer la conexión en el constructor
        $this->conectar();
    }

    private function conectar() {
        try {
            $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->bd);
            
            // Verificar si hay error de conexión
            if ($this->conexion->connect_error) {
                throw new Exception("Error de conexión: " . $this->conexion->connect_error);
            }
        } catch (Exception $e) {
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }

    public function getProducts() {
        $query = "SELECT * FROM productos";
        $resultado = $this->conexion->query($query);
        
        if (!$resultado) {
            throw new Exception("Error en la consulta: " . $this->conexion->error);
        }
        
        return $resultado;
    }
}
?>