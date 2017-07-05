<?php

$container = $app->getContainer();


$container['db'] = function($c){
	$db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'], $db['user'], $db['password']);
    $pdo->exec("SET CHARACTER SET {$db['charset']}");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container['view'] = function($c){
	return new \Slim\Views\PhpRenderer("../templates/");
};

$container['UserController'] = function($c){
	return new \App\Controllers\UserController($c);
};