<?php

use Home\Controller\HomeController;
use Router\Router;

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../app/config/autoload/autoload.php";

$router = new Router();
$controller = $router->getController();
$method = $router->getMethod();


$view = new $controller;
$view->$method();

echo "<h1>INDEX PRINCIPAL</h1>";