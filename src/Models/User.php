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
	}

	function show($id){
		$sql = $this->db->prepare("SELECT * FROM notas WHERE id = :id");
		$sql->execute(array(":id"=>$id));
		$data = $sql->fetchAll(PDO::FETCH_ASSOC);
		
		return $data;
	}

	function new($name, $description){
		$sql = $this->db->prepare("INSERT INTO notas (nombre, descripcion) VALUES (:name,:description)");
		$sql->execute(array(":name"=>$name, ":description"=>$description));
		$data = "Usuario insertado con exito";
		
		return $data;
	}
}