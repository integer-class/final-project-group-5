<?php 

namespace controllers;
use models\ProductModel;
use models\UserModel;
require_once '../app/models/ProductModel.php';
require_once '../app/models/UserModel.php';

class AdminController {
    // render section
    public function renderHome() {
        require_once '../app/views/admin/home.php';
    }

    public function renderUser() {
        $userModel = new UserModel();
        $user_data = $userModel->getAllUsers();
        require_once '../app/views/admin/user.php';
    }

    public function renderProduct() {
        $productModel = new ProductModel();
        $product_data = $productModel->getAllProducts();
        require_once '../app/views/admin/product.php';
    }

    public function renderCreateProduct() {
        require_once '../app/views/admin/createProduct.php';
    }

    public function renderEditProduct() {
        $product_id = $_GET['product_id'] ?? null;
    
        if (!$product_id) {
            echo "Product ID not provided.";
            exit();
        }
    
        $productModel = new ProductModel();
        $productData = $productModel->getProductById($product_id);
    
        if ($productData) {
            require_once '../app/views/admin/editProduct.php';
        } else {
            echo "User not found.";
            exit();
        }
        require_once '../app/views/admin/editProduct.php';
    }

    public function renderCreateUser() {
        require_once '../app/views/admin/createUser.php';
    }

    public function renderEditUser() {
        $user_id = $_GET['user_id'] ?? null;
        
        if (!$user_id) {
            echo "User ID not provided.";
            exit();
        }

        $userModel = new UserModel();
        $userData = $userModel->getUserById($user_id);

        if ($userData) {
            require_once '../app/views/admin/editUser.php';
        } else {
            echo "User not found.";
            exit();
        
    }
        require_once '../app/views/admin/editUser.php';
    }


    // CRUD user
    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();
            
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $email = $_POST['email'] ?? '';
            $role = $_POST['role'] ?? '';
            $address = $_POST['address'] ?? '';
            $phone_number = $_POST['phone_number'] ?? '';
            
            $result = $userModel->createUser($username, $password, $email, $role, $address, $phone_number);
            if ($result) {
                header('Location: /admin/user');
                exit;
            } else {
                echo "Failed to create user";
            }
        }
    }

    public function editUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();
            
            $user_id = $_POST['user_id'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $email = $_POST['email'] ?? '';
            $role = $_POST['role'] ?? '';
            $address = $_POST['address'] ?? '';
            $phone_number = $_POST['phone_number'] ?? '';
            
            $result = $userModel->updateUser($user_id, $username, $password, $email, $role, $address, $phone_number);
            if ($result) {
                header('Location: /admin/user');
                exit;
            } else {
                echo "Failed to edit user";
            }
        }
    }

    public function deleteUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();
            
            $user_id = $_POST['user_id'] ?? '';
            
            $result = $userModel->deleteUser($user_id);
            if ($result) {
                header('Location: /admin/user');
                exit;
            } else {
                echo "Failed to delete user";
            }
        }
    }

    
    // CRUD product
    public function createProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productModel = new ProductModel();
            
            $product_name = $_POST['product_name'] ?? '';
            $supplier_name = $_POST['supplier_name'] ?? '';
            $description = $_POST['description'] ?? '';
            $category = $_POST['category'] ?? '';
            $stock = $_POST['stock'] ?? '';
            $buy_price = $_POST['buy_price'] ?? '';
            $sell_price = $_POST['sell_price'] ?? '';
            
            $result = $productModel->createProduct($product_name, $supplier_name, $description, $category, $stock, $buy_price, $sell_price);
            if ($result) {
                header('Location: /admin/product');
                exit;
            } else {
                echo "Failed to create product";
            }
        }
    }

    public function editProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productModel = new ProductModel();
            
            $product_id = $_POST['product_id'] ?? '';
            $product_name = $_POST['product_name'] ?? '';
            $supplier_name = $_POST['supplier_name'] ?? '';
            $description = $_POST['description'] ?? '';
            $category = $_POST['category'] ?? '';
            $stock = $_POST['stock'] ?? '';
            $buy_price = $_POST['buy_price'] ?? '';
            $sell_price = $_POST['sell_price'] ?? '';
            
            $result = $productModel->updateProduct($product_id, $product_name, $supplier_name, $description, $category, $stock, $buy_price, $sell_price);
            if ($result) {
                header('Location: /admin/product');
                exit;
            } else {
                echo "Failed to edit product";
            }
        }
    }

    public function deleteProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productModel = new ProductModel();
            
            $product_id = $_POST['product_id'] ?? '';
            
            $result = $productModel->deleteProduct($product_id);
            if ($result) {
                header('Location: /admin/product');
                exit;
            } else {
                echo "Failed to delete product";
            }
        }
    }
    
}

?>