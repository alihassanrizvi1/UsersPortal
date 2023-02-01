<?php
include_once  "Config/config.php";

class Database {
	
	private $connnection;
	
	public function __construct() {
		$dsn = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";";
		$this->connection = new PDO($dsn, DB_USER, DB_PASS);
	}
	
	public function PrepareQuery($query) {
		return $this->connection->prepare($query);
	}
}

?>