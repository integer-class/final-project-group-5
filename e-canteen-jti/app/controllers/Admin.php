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
            $user = new User();
            $user->setUsername($_POST['username']);
            $username = $user->getUsername();
            $user_data = $user->getDataByName($username);

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
            $product = new Product();
            $product->setProductName($_POST['product_name']);
            $product_name = $product->getProductName();
            $product_data = $product->getDataByName($product_name);

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
        $user = new User();
        $user->setUserId($_GET['user_id']);
        $user_id = $user->getUserId();
        
        if (!$user_id) {
            echo "User ID not provided.";
            exit();
        }

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

    public function getReportByDate() {
        if (isset($_POST['date'])) {
            $salesTransaction = new SalesTransaction();
            $salesTransaction->setSalesTransactionDate($_POST['date']);
            $date = $salesTransaction->getSalesTransactionDate();
            $salesTransactionData = $salesTransaction->getDataByDate($date);

            require_once '../app/views/admin/report.php';
        }
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
    
        $salesTransactionDetail = new SalesTransactionDetail();
        $salesTransactionDetailData = $salesTransactionDetail->getDataByTransactionCode($salesTransactionData->getSalesTransactionCode());
    
        require_once '../app/views/admin/reportDetail.php';
    }


    // CRUD user
    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();

            $user->setUsername($_POST['username']);
            $user->setPassword(md5($_POST['password']));
            $user->setEmail($_POST['email']);
            $user->setRole($_POST['role']);
            $user->setAddress($_POST['address']);
            $user->setPhoneNumber($_POST['phone_number']);
            
            $data = [
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'email' => $user->getEmail(),
                'role' => $user->getRole(),
                'address' => $user->getAddress(),
                'phone_number' => $user->getPhoneNumber()
            ];
            
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
            
            $user->setUserId($_POST['user_id']);
            $user->setUsername($_POST['username']);
            $user->setPassword(md5($_POST['password']));
            $user->setEmail($_POST['email']);
            $user->setRole($_POST['role']);
            $user->setAddress($_POST['address']);
            $user->setPhoneNumber($_POST['phone_number']);
            
            $data = [
                'user_id' => $user->getUserId(),
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'email' => $user->getEmail(),
                'role' => $user->getRole(),
                'address' => $user->getAddress(),
                'phone_number' => $user->getPhoneNumber()
            ];
            
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

            $user->setUserId($_POST['user_id']);
            $user_id = $user->getUserId();
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
            $product->setProductCode("PRODUCT-" . strval(rand(1000000000, 9999999999)));
            $product->setProductName($_POST['product_name']);
            $product->setSupplierName($_POST['supplier_name']);
            $product->setDescription($_POST['description']);
            $product->setCategory($_POST['category']);
            $product->setStock($_POST['stock']);
            $product->setBuyPrice($_POST['buy_price']);
            $product->setSellPrice($_POST['sell_price']);
            $product->setImage($_FILES['image']);

            $data = [
                'product_code' => $product->getProductCode(),
                'product_name' => $product->getProductName(),
                'supplier_name' => $product->getSupplierName(),
                'description' => $product->getDescription(),
                'category' => $product->getCategory(),
                'stock' => $product->getStock(),
                'buy_price' => $product->getBuyPrice(),
                'sell_price' => $product->getSellPrice(),
                'image' => $product->getImage()
            ];
            $targetDirectory = "/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/";
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }
            $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
            $maxFileSize = 5 * 1024 * 1024;
    
            if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
                if (in_array($fileType, $allowedExtensions) && $_FILES["image"]["size"] <= $maxFileSize) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        $data['image'] = $targetFile;
                    }
                } else {
                    echo "Invalid file format or file size exceeds limit.";
                    exit;
                }
            } else {
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

            $product->setProductId($_POST['product_id']);
            $product->setProductCode($_POST['product_code']);
            $product->setProductName($_POST['product_name']);
            $product->setSupplierName($_POST['supplier_name']);
            $product->setDescription($_POST['description']);
            $product->setCategory($_POST['category']);
            $product->setStock($_POST['stock']);
            $product->setBuyPrice($_POST['buy_price']);
            $product->setSellPrice($_POST['sell_price']);
            $product->setImage($_FILES['image']);
            $data = [
                'product_id' => $product->getProductId(),
                'product_code' => $product->getProductCode(),
                'product_name' => $product->getProductName(),
                'supplier_name' => $product->getSupplierName(),
                'description' => $product->getDescription(),
                'category' => $product->getCategory(),
                'stock' => $product->getStock(),
                'buy_price' => $product->getBuyPrice(),
                'sell_price' => $product->getSellPrice(),
                'image' => $product->getImage()
            ];
            $targetDirectory = "/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/";
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }
            $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
            $maxFileSize = 5 * 1024 * 1024;
    
            if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
                if (in_array($fileType, $allowedExtensions) && $_FILES["image"]["size"] <= $maxFileSize) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        $data['image'] = $targetFile;
                    }
                } else {
                    echo "Invalid file format or file size exceeds limit.";
                    exit;
                }
            } else {
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
            $product->setProductId($_POST['product_id']);
            $product_id = $product->getProductId();
            
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