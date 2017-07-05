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
		$response = $this->container->view->render($response, "users.phtml", ["users" => $users]);
    return $response;
	}
}