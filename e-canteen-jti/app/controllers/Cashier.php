<?php 

namespace controllers;
use models\Product;
require_once '../app/models/Product.php';

class Cashier {
    public function __construct() {
        Auth::checkAuth('cashier');
    }
    public function renderHome() {
        require_once '../app/views/cashier/home.php';
    }

    public function renderCart() {
        $product = new Product();
        $product_data = $product->getAll();
        require_once '../app/views/cashier/cart.php';
    }
}

?>