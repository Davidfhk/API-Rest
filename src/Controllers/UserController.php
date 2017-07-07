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

	function new($request, $response){
		$name = $request->getParam('name');
		$description = $request->getParam('description');

		$user = new User($this->container->db);
		$user = $user->new($name, $description);
		$response = $user;
	return $response;

	}

	function delete($request, $response, $args){
		$user = new User($this->container->db);
		$id = (int)$args['id'];
		$user = $user->delete($id);
		$response = $user;
	return $response;
	}

	function update($request,$response,$args){
		$datas = $request->getParsedBody();

		$id = (int)$args['id'];
		$name = $datas['name'];
		$description = $datas['description'];
		
		$user = new User($this->container->db);
		$user = $user->update($name, $description, $id);
		$response = $user;
	return $response;
	}
}