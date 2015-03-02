<?php

require '../vendor/autoload.php';

$app = new \SlimController\Slim([
    'controller.class_prefix'    => '\\konekobox\\chisai\\controllers',
    'controller.method_suffix'   => 'Action',
    'view' => new \Slim\Views\Twig(),
    'templates.path' => '../app/views/'
]);


require_once '../app/bootstrap.php';

$app->run();