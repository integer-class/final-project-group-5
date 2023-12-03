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
//auth
$route->add('GET', '/login', LoginController::class, 'login');
$route->add('POST', '/login', LoginController::class, 'loginProcess');

//render admin
$route->add('GET', '/admin/home', AdminController::class, 'renderHome');
$route->add('GET', '/admin/user', AdminController::class, 'renderUser');
$route->add('GET', '/admin/product', AdminController::class, 'renderProduct');
$route->add('GET', '/admin/createProduct', AdminController::class, 'renderCreateProduct');
$route->add('GET', '/admin/editProduct', AdminController::class, 'renderEditProduct');
$route->add('GET', '/admin/createUser', AdminController::class, 'renderCreateUser');
$route->add('GET', '/admin/editUser', AdminController::class, 'renderEditUser');

// crud user
$route->add('POST', '/admin/createUser', AdminController::class, 'createUser');
$route->add('POST', '/admin/editUser', AdminController::class, 'editUser');
$route->add('POST', '/admin/deleteUser', AdminController::class, 'deleteUser');

// crud product
$route->add('POST', '/admin/createProduct', AdminController::class, 'createProduct');
$route->add('POST', '/admin/editProduct', AdminController::class, 'editProduct');
$route->add('POST', '/admin/deleteProduct', AdminController::class, 'deleteProduct');

//cashier
$route->add('GET', '/cashier/home', CashierController::class, 'cashierHome');

//run route
$route->run();

?>