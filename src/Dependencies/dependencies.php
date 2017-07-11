<?php
use App\Db\DbConnect;

$container = $app->getContainer();


$container['db'] = function($c){
	$db = $c['settings']['db'];
	$pdo = DbConnect::getInstance($db);
    return $pdo;
};

$container['view'] = function($c){
	return new \Slim\Views\PhpRenderer("../templates/");
};

$container['UserController'] = function($c){
	return new \App\Controllers\UserController($c);
};