<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app->get('/', function (Request $request, Response $response){
	$response->getBody()->write('Bienvenido');
    return $response;
});


$app->get('/users', 'UserController:all');

$app->get('/user/{id}', 'UserController:show');

$app->post('/new', 'UserController:new');