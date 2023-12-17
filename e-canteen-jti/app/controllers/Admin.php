<?php 

namespace controllers;
use models\Product;
use models\User;
require_once '../app/models/Product.php';
require_once '../app/models/User.php';
use models\SalesTransaction;
require_once '../app/models/SalesTransaction.php';
use models\SalesTransactionDetail;
require_once '../app/models/SalesTransactionDetail.php';

class Admin {
    public function __construct() {
        Auth::checkAuth('admin');
    }
    // render section
    public function renderHome() {
        require_once '../app/views/admin/home.php';
    }

    public function renderUser() {
        $user = new User();
        $user_data = $user->getAll();
        require_once '../app/views/admin/user.php';
    }

    public function getUsername() {
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $user = new User();
            $user_data = $user->getDataByUsername($username);

            require_once '../app/views/admin/user.php';
        }
    }

    public function renderProduct() {
        $product = new Product();
        $product_data = $product->getAll();
        require_once '../app/views/admin/product.php';
    }

    public function getProductName() {
        if (isset($_POST['product_name'])) {
            $product_name = $_POST['product_name'];
            $product = new Product();
            $product_data = $product->getDataByProductName($product_name);

            require_once '../app/views/admin/product.php';
        }
    }

    public function renderCreateProduct() {
        require_once '../app/views/admin/productCreate.php';
    }

    public function renderDetailProduct() {
        $product_id = $_GET['product_id'] ?? null;
    
        if (!$product_id) {
            echo "Product ID not provided.";
            exit();
        }
    
        $product = new Product();
        $productData = $product->getDataById($product_id);
    
        if ($productData) {
            require_once '../app/views/admin/productDetail.php';
        } else {
            echo "User not found.";
            exit();
        }
        require_once '../app/views/admin/productDetail.php';
    }

    public function renderEditProduct() {
        $product_id = $_GET['product_id'] ?? null;
    
        if (!$product_id) {
            echo "Product ID not provided.";
            exit();
        }
    
        $product = new Product();
        $productData = $product->getDataById($product_id);
    
        if ($productData) {
            require_once '../app/views/admin/productEdit.php';
        } else {
            echo "User not found.";
            exit();
        }
        require_once '../app/views/admin/productEdit.php';
    }

    public function renderCreateUser() {
        require_once '../app/views/admin/userCreate.php';
    }

    public function renderEditUser() {
        $user_id = $_GET['user_id'] ?? null;
        
        if (!$user_id) {
            echo "User ID not provided.";
            exit();
        }

        $user = new User();
        $userData = $user->getDataById($user_id);

        if ($userData) {
            require_once '../app/views/admin/userEdit.php';
        } else {
            echo "User not found.";
            exit();
        
    }
        require_once '../app/views/admin/userEdit.php';
    }

    public function renderReport() {
        $salesTransaction = new SalesTransaction();
        $salesTransactionData = $salesTransaction->getAll();
        require_once '../app/views/admin/report.php';
    }

    public function renderPrintReport() {
        $salesTransaction = new SalesTransaction();
        $salesTransactionData = $salesTransaction->getAll();
        require_once '../app/views/admin/printReport.php';
    }

    public function renderDetailReport() {
        $salesTransactionId = $_GET['sales_transaction_id'] ?? null;
    
        if (!$salesTransactionId) {
            echo "Sales Transaction ID not provided.";
            exit();
        }
    
        $salesTransaction = new SalesTransaction();
        $salesTransactionData = $salesTransaction->getDataById($salesTransactionId);
    
        if (!$salesTransactionData) {
            echo "Sales Transaction not found.";
            exit();
        }
    
        $sales_transaction_code = $salesTransactionData['sales_transaction_code'];
    
        $salesTransactionDetail = new SalesTransactionDetail();
        $salesTransactionDetailData = $salesTransactionDetail->getDataByTransactionCode($sales_transaction_code);
    
        require_once '../app/views/admin/reportDetail.php';
    }


    // CRUD user
    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            
            $data['username'] = $_POST['username'] ?? '';
            $data['password'] = $_POST['password'] ?? '';
            $data['email'] = $_POST['email'] ?? '';
            $data['role'] = $_POST['role'] ?? '';
            $data['address'] = $_POST['address'] ?? '';
            $data['phone_number'] = $_POST['phone_number'] ?? '';
            
            $result = $user->create($data);
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
            $user = new User();
            
            $data['user_id'] = $_POST['user_id'] ?? '';
            $data['username'] = $_POST['username'] ?? '';
            $data['password'] = $_POST['password'] ?? '';
            $data['email'] = $_POST['email'] ?? '';
            $data['role'] = $_POST['role'] ?? '';
            $data['address'] = $_POST['address'] ?? '';
            $data['phone_number'] = $_POST['phone_number'] ?? '';
            
            $result = $user->update($data);
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
            $user = new User();
            
            $user_id = $_POST['user_id'] ?? '';
            
            $result = $user->delete($user_id);
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
            $product = new Product();
            $product_code = "PRODUCT-" . strval(rand(1000000000, 9999999999));
            
            $data['product_code'] = $product_code ?? '';
            $data['product_name'] = $_POST['product_name'] ?? '';
            $data['supplier_name'] = $_POST['supplier_name'] ?? '';
            $data['description'] = $_POST['description'] ?? '';
            $data['category'] = $_POST['category'] ?? '';
            $data['stock'] = $_POST['stock'] ?? '';
            $data['buy_price'] = $_POST['buy_price'] ?? '';
            $data['sell_price'] = $_POST['sell_price'] ?? '';
            $targetDirectory = "/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/";
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }
            $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
            $maxFileSize = 5 * 1024 * 1024; // 5 MB
    
            if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
                if (in_array($fileType, $allowedExtensions) && $_FILES["image"]["size"] <= $maxFileSize) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        $data['image'] = $targetFile; // Isi nama file gambar ke variabel $data['image']
                    }
                } else {
                    echo "Invalid file format or file size exceeds limit.";
                    exit;
                }
            } else {
                // handle error, e.g., set a default image or show an error message
                echo "File upload error.";
                exit;
            }
            
            $result = $product->create($data);
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
            $product = new Product();
            
            $data['product_id'] = $_POST['product_id'] ?? '';
            $data['product_code'] = $_POST['product_code'] ?? '';
            $data['product_name'] = $_POST['product_name'] ?? '';
            $data['supplier_name'] = $_POST['supplier_name'] ?? '';
            $data['description'] = $_POST['description'] ?? '';
            $data['category'] = $_POST['category'] ?? '';
            $data['stock'] = $_POST['stock'] ?? '';
            $data['buy_price'] = $_POST['buy_price'] ?? '';
            $data['sell_price'] = $_POST['sell_price'] ?? '';
            $targetDirectory = "/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/";
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }
            $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
            $maxFileSize = 5 * 1024 * 1024; // 5 MB
    
            if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
                if (in_array($fileType, $allowedExtensions) && $_FILES["image"]["size"] <= $maxFileSize) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        $data['image'] = $targetFile; // Isi nama file gambar ke variabel $data['image']
                    }
                } else {
                    echo "Invalid file format or file size exceeds limit.";
                    exit;
                }
            } else {
                // handle error, e.g., set a default image or show an error message
                echo "File upload error.";
                exit;
            }
            
            $result = $product->update($data);
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
            $product = new Product();
            
            $product_id = $_POST['product_id'] ?? '';
            
            $result = $product->delete($product_id);
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