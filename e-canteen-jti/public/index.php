<?php

require_once '../app/app/Router.php';
require_once '../app/controllers/LoginController.php';
require_once '../app/controllers/AdminController.php';
require_once '../app/controllers/CashierController.php';
use app\Router;
use controllers\LoginController;
use controllers\AdminController;
use controllers\CashierController;

$route = new Router();
$route->add('GET', '/login', LoginController::class, 'login');
$route->add('POST', '/login', LoginController::class, 'loginProcess');
$route->add('GET', '/admin/home', AdminController::class, 'adminHome');
$route->add('GET', '/cashier/home', CashierController::class, 'cashierHome');
$route->run();

?>