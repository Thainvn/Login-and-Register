<?php 	
	class Database{
		// variables to connect to database
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "login";
		private $conn;

		// constructor
		public function getConn(){
			return $this->conn;
		}
		// get connect
		public function getDatabase(){
			try {

				$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);

			} catch (PDOException $e) {
				echo "Error : " .$e->getMessage();
			}
		}

	}
	

?>
