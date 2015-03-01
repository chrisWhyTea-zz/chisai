<?php


require_once '../config.php';

/**
 * Database configuration for Paris & Idiorm
 */
ORM::configure("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME);
ORM::configure('username', DB_USER);
ORM::configure('password', DB_PASSWORD);
Model::$auto_prefix_models = "\\konekobox\\chisai\\models\\";

/**
 * Add Repositorys as Singletons (UGLY!) @Todo find replace for Singletons!
 */
$app->container->singleton('shorturlRepo', function () {
    return new \konekobox\chisai\repositories\ShorturlRepository();
});


/**
 * Add Twig Extensions
 */
$view = $app->view();
$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

/**
 * Lets go to the routes file where the routing is happen :D
 */
require_once 'routes.php';