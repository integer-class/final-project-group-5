<?php 

namespace controllers;

class Cashier {
    public function __construct() {
        Auth::checkAuth('cashier');
    }
    public function cashierHome() {
        require_once '../app/views/cashier/home.php';
    }
}

?>