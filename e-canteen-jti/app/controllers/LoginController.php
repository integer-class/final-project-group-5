<?php 

namespace controllers;
require_once '../app/models/UserModel.php';
use models\UserModel;

class LoginController {
    public function login() {
        require_once '../app/views/auth/login.php';
    }

    public function loginProcess() {
        $userModel = new UserModel();
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $userData = $userModel->getUserData($username, $password);
        $role = $userData['role'];
        
        if ($role === 'admin') {
            header('Location: /admin/home');
        } else if ($role  === 'cashier') {
            header('Location: /cashier/home');
        } else {
            header('Location: /login');
        }
    }
}

?>