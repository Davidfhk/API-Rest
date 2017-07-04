<?php

require '../vendor/autoload.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true,

    ],
];


$app = new \Slim\App(['settings' => $config['settings']]);

require '../src/routes/routes.php';

$app->run();