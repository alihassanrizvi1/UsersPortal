<?php
include_once "Db/Database.php";

class User {
	
	private $db;
	
	public function __construct() {
		$this->db = new Database();
	}
	
	public function list() {
		try {
			$query = $this->db->PrepareQuery("SELECT * FROM user;");
			$query->execute();
			return $query->fetchAll();
		}
		catch(Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getUser($id) {
		try {
			$query = $this->db->PrepareQuery("SELECT * FROM user where id=?;");
			$query->execute([$id]);
			return $query->fetchAll();
		}
		catch(Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function setUser($name) {
		try {
			$query = $this->db->PrepareQuery("INSERT INTO user(id, name) values(?,?); ");
			$query->execute([$this->generateUserId(), $name]);
			return true;
		}
		catch(Exception $e) {
			return $e->getMessage();
		}
	}
	
	private function generateUserId() {
		return join('-', str_split(bin2hex(openssl_random_pseudo_bytes(16)), rand(4,6)));
	}
}
?>