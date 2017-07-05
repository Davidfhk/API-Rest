<?php

namespace App\Models;
use \PDO;

class User
{
	private $db;

	function __construct($db){
		$this->db = $db;
	}

	function all(){
		$sql = $this->db->prepare("SELECT * FROM notas");
		$sql->execute();
		$data = $sql->fetchAll(PDO::FETCH_ASSOC);
		
		return $data;
		// var_dump($data);
	}
}