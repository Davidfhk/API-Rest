<?php

namespace App\Db;
use \PDO;

class DbConnect
{
	private static $instance;
	private function __construct(){}
	private function __clone(){}
	private static function connect($db)
	{
		try{
			$conexion = new PDO("mysql:host={$db['host']};dbname={$db['dbname']}",$db['user'],$db['password']);
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$conexion->exec("SET CHARACTER SET {$db['charset']}");		
		}catch(Exception $e){
			die('Error '. $e->getMessage());
			echo "Linea del error " . $e->getLine();
		}
		return $conexion;
	}
	
	public static function getInstance($db){
		if (self::$instance == null) {
			self::$instance = self::connect($db);
		}
		return self::$instance;
	}
}