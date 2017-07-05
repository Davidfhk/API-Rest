<?php

require '../vendor/autoload.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true,
        'db'=>[
    		'host'		=>	'localhost',
			'dbname'	=>	'api_mcfly',
			'charset'	=>	'utf8',
			'user'		=>	'root',
			'password'	=>	''
        ],


    ],
];


$app = new \Slim\App(['settings' => $config['settings']]);

require '../src/dependencies/dependencies.php';


require '../src/routes/routes.php';

$app->run();