<?php

require '../vendor/autoload.php';

$app = new \Slim\Slim([
    //'debug' => false,
    'view' => new \Slim\Views\Twig(),
    'templates.path' => '../app/views/'
]);



require_once '../app/bootstrap.php';

$app->run();