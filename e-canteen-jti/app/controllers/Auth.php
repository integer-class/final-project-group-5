<?php 

namespace controllers;
require_once '../app/models/User.php';
use models\User;

class Auth {
    public function login() {
        session_start();
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] === 'admin') {
                header('Location: /admin/home');
                exit;
            } else if ($_SESSION['role'] === 'cashier') {
                header('Location: /cashier/home');
                exit;
            } else {
                header('Location: /login');
                exit;
            }
        }
        require_once '../app/views/auth/login.php';
    }

    public function loginProcess() {
        $user = new User();
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $userData = $user->getUserDataLogin($username, $password);
        $role = $userData['role'];
        
        if ($role === 'admin') {
            session_start();
            $_SESSION['user_id'] = $userData['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header('Location: /admin/home');
        } else if ($role  === 'cashier') {
            session_start();
            $_SESSION['user_id'] = $userData['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header('Location: /cashier/home');
        } else {
            header('Location: /login?error=failed');
        }
    }

    public function logout() {
        session_start();
        if (isset($_SESSION['role'])) {
            session_unset();
            session_destroy();
        }
        header('Location: /login');
        exit;
    }

    public static function checkAuth($role = null) {
        session_start();
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
            header('Location: /login');
            exit;
        }
    }
}
?>