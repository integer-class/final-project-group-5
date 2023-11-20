<?php

require_once '../app/app/Router.php';
require_once '../app/controllers/LoginController.php';
use app\Router;
use controllers\LoginController;

$route = new Router();
$route->add('GET', '/', LoginController::class, 'index');
$route->run();

?>