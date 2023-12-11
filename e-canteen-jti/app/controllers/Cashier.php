<?php 

namespace controllers;
use models\Product;
require_once '../app/models/Product.php';
use models\SalesTransaction;
require_once '../app/models/SalesTransaction.php';
use models\SalesTransactionDetail;
require_once '../app/models/SalesTransactionDetail.php';
use models\User;
require_once '../app/models/User.php';

class Cashier {
    public function __construct() {
        Auth::checkAuth('cashier');
    }
    public function renderHome() {
        require_once '../app/views/cashier/home.php';
    }

    public function renderSales() {
        $userData = $_SESSION['user_id'];
        $product = new Product();
        $product_data = $product->getAll();
        require_once '../app/views/cashier/sales.php';
    }

    public function processSale() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['product_id'], $_POST['quantity'], $_POST['paid'], $_POST['user_id'])) {
                $salesTransaction = new SalesTransaction();
                $salesTransactionDetail = new SalesTransactionDetail();
    
                $product = new Product();
                $productData = $product->getDataById($_POST['product_id']); 
                $productPrice = isset($productData['sell_price']) ? $productData['sell_price'] : 0; 
    
                $total = $productPrice * $_POST['quantity'];
    
                $salesData = [
                    'sales_transaction_date' => date('Y-m-d H:i:s'), 
                    'total' => $total,
                    'paid' => $_POST['paid'],
                    'change' => $_POST['paid'] - $total,
                    'user_id' => $_POST['user_id'],
                ];
    
                $salesTransactionId = $salesTransaction->create($salesData);
    
                if ($salesTransactionId) {
                    $detailData = [
                        'sales_transaction_id' => $salesTransactionId,
                        'product_id' => isset($productData['product_id']) ? $productData['product_id'] : null,
                        'sell_price' => $productPrice,
                        'quantity' => $_POST['quantity'],
                        'subtotal' => $_POST['quantity'] * $productPrice,
                    ];
    
                    $salesTransactionDetail->create($detailData);
    
                    header('Location: /cashier/sales');
                    exit();
                } else {
                    echo "Failed to process sale.";
                }
            } else {
                echo "Missing required data.";
            }
        } else {
            echo "Invalid request method.";
        }
    }
    
}

?>