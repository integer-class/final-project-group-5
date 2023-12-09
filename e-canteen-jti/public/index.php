<?php

require_once '../app/config/Router.php';
require_once '../app/controllers/Auth.php';
require_once '../app/controllers/Admin.php';
require_once '../app/controllers/Cashier.php';
use config\Router;
use controllers\Auth;
use controllers\Admin;
use controllers\Cashier;

$route = new Router();
//auth
$route->add('GET', '/login', Auth::class, 'login');
$route->add('POST', '/login', Auth::class, 'loginProcess');
$route->add('GET', '/logout', Auth::class,'logout');

//render admin
$route->add('GET', '/admin/home', Admin::class, 'renderHome');
$route->add('GET', '/admin/user', Admin::class, 'renderUser');
$route->add('GET', '/admin/product', Admin::class, 'renderProduct');
$route->add('GET', '/admin/createProduct', Admin::class, 'renderCreateProduct');
$route->add('GET', '/admin/editProduct', Admin::class, 'renderEditProduct');
$route->add('GET', '/admin/createUser', Admin::class, 'renderCreateUser');
$route->add('GET', '/admin/editUser', Admin::class, 'renderEditUser');

// crud user
$route->add('POST', '/admin/createUser', Admin::class, 'createUser');
$route->add('POST', '/admin/editUser', Admin::class, 'editUser');
$route->add('POST', '/admin/deleteUser', Admin::class, 'deleteUser');

// crud product
$route->add('POST', '/admin/createProduct', Admin::class, 'createProduct');
$route->add('POST', '/admin/editProduct', Admin::class, 'editProduct');
$route->add('POST', '/admin/deleteProduct', Admin::class, 'deleteProduct');

//cashier
$route->add('GET', '/cashier/home', Cashier::class, 'cashierHome');

//run route
$route->run();

?>