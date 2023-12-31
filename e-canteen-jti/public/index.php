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
$route->add('GET', '/admin/detailProduct', Admin::class, 'renderDetailProduct');
$route->add('GET', '/admin/createUser', Admin::class, 'renderCreateUser');
$route->add('GET', '/admin/editUser', Admin::class, 'renderEditUser');
$route->add('GET', '/admin/report', Admin::class, 'renderReport');
$route->add('GET', '/admin/detailReport', Admin::class, 'renderdetailReport');
$route->add('GET', '/admin/printReport', Admin::class, 'renderPrintReport');

// crud user
$route->add('POST', '/admin/createUser', Admin::class, 'createUser');
$route->add('POST', '/admin/editUser', Admin::class, 'editUser');
$route->add('POST', '/admin/deleteUser', Admin::class, 'deleteUser');
$route->add('POST', '/admin/getUsername', Admin::class, 'getUsername');

$route->add('POST', '/admin/getReportByDate', Admin::class, 'getReportByDate');
$route->add('POST', '/cashier/getReportByDate', Cashier::class, 'getReportByDate');

// crud product
$route->add('POST', '/admin/createProduct', Admin::class, 'createProduct');
$route->add('POST', '/admin/editProduct', Admin::class, 'editProduct');
$route->add('POST', '/admin/deleteProduct', Admin::class, 'deleteProduct');
$route->add('POST', '/admin/getProductName', Admin::class, 'getProductName');

//cashier
$route->add('POST', '/cashier/getProductName', Cashier::class, 'getProductName');
$route->add('GET', '/cashier/home', Cashier::class, 'renderHome');
$route->add('GET', '/cashier/sales', Cashier::class, 'renderSales');
$route->add('GET', '/cashier/report', Cashier::class, 'renderReport');
$route->add('GET', '/cashier/detailReport', Cashier::class, 'renderDetailReport');
$route->add('GET', '/cashier/product', Cashier::class, 'renderProduct');
$route->add('GET', '/cashier/detailProduct', Cashier::class, 'renderDetailProduct');
$route->add('GET', '/cashier/printReport', Cashier::class, 'renderPrintReport');
$route->add('POST', '/cashier/addItem', Cashier::class, 'addItem');
$route->add('POST', '/cashier/completeTransaction', Cashier::class, 'completeTransaction');
$route->add('POST', '/cashier/processSale', Cashier::class, 'processSale');


//run route
$route->run();

?>