<?php

namespace App\Controllers;
use App\Models\User;

class UserController
{
	private $container;

	function __construct($c){
		$this->container = $c;
	}

	function all($request, $response){
		$user = new User($this->container->db);
		$users = $user->all();
		$response = json_encode($users);
    return $response;
	}

	function show($request, $response, $args){
		$user = new User($this->container->db);
		$id = (int)$args['id'];
		$user = $user->show($id);
		$response = json_encode($user);
	return $response;

	}
}