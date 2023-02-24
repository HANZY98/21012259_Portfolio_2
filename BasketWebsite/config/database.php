<?php
// This is class was created to allow for the DB to be connected to.
class My_database{
	// Database details and properties.
	private $host = "localhost";
	private $db_name = "shopping_cart";
	private $username = "root";
	private $password = "";
	public $conn;
	// This function was created to get the database connection.
	public function connect_Get(){
		$this->conn = null;
		try{
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
		}catch(PDOException $exception){
			echo "Connection error: " . $exception->getMessage();
		}
		return $this->conn;
	}
}
?>