<?php
class Database
{
	public $pdo;
	private $user;
	private $password;
	private $charset = "utf8mb4";
	private $dbName;
	private $host;
	private $dsn;

	public function __construct()
	{
		$this->host = "localhost";
		$this->user = "root";
		$this->password = "";
		$this->dbName = "empresa";
		$this->dsn = "mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}";
		try {
			$this->pdo = new PDO($this->dsn, $this->user, $this->password);

			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e) {
			die("Error en la conexion: " . $e->getMessage());
		}
	}

	public function getConnection()
	{
		return $this->pdo;
	}
}
?>