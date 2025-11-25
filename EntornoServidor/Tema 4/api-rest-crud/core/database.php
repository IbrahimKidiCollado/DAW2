<?php

class Database
{
	private $user;
	private $password;
	private $host;
	private $dsn;
	private $db;
	private $pdo;


	public function conexion()
	{
		$this->pdo = null;
		$this->user = "root";
		$this->password = "";
		$this->host = "localhost";
		$this->db = "empresa";

		$this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";

		try {
			$this->pdo = new PDO($this->dsn, $this->user, $this->password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Error en la conexion: " . $e->getMessage());
		}

		return $this->pdo;
	}

	// Wrapper en inglés para compatibilidad con index.php
	public function connect()
	{
		return $this->conexion();
	}
}

?>