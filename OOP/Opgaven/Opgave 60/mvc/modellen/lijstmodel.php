<?php
class LijstModel {
	
	private $conn;
	private $host;
	private $user;
	private $password;
	private $databasename;
 
    public function __construct() {
		$this->conn = false;
		$this->host = 'localhost';
		$this->user = 'root';
		$this->password = '';
		$this->databasename = 'webshop';
		$this->connect();
	}
 
	public function __destruct() {
		$this->disconnect();
	}
	
	public function connect() {
		if (!$this->conn) {
			try {
				$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->databasename.'', $this->user, $this->password);  
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (Exception $e) {
				die('Error : ' . $e->getMessage());
			}
		}
		return $this->conn;
	}
 
	public function disconnect() {
		if ($this->conn) {
			$this->conn = null;
		}
	}
	
	public function getData($query) {
		$result = $this->conn->prepare($query);
		$execute = $result->execute();
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$dataresult = $result->fetchAll();
		return $dataresult;
	}
	
	public function lijst(){
		$data = $this->getData('SELECT titel, artiest FROM album');
		foreach($data as $dat) {
			echo $dat['titel'].' - '.$dat['artiest'] . "<br>";
		}
	}
}
?>