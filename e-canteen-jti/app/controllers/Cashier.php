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

    public function renderPrintReport() {
        $salesTransaction = new SalesTransaction();
        $salesTransactionData = $salesTransaction->getAll();
        require_once '../app/views/cashier/printReport.php';
    }

    public function renderReport() {
        $salesTransaction = new SalesTransaction();
        $salesTransactionData = $salesTransaction->getAll();
        require_once '../app/views/cashier/report.php';
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

    require_once '../app/views/cashier/reportDetail.php';
}


    public function renderProduct() {
        $product = new Product();
        $product_data = $product->getAll();
        require_once '../app/views/cashier/product.php';
    }

    public function getProductName() {
        if (isset($_POST['product_name'])) {
            $product_name = $_POST['product_name'];
            $product = new Product();
            $product_data = $product->getDataByProductName($product_name);

            require_once '../app/views/cashier/product.php';
        }
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
            require_once '../app/views/cashier/productDetail.php';
        } else {
            echo "User not found.";
            exit();
        }
        require_once '../app/views/cashier/productDetail.php';
    }

    public function generateReceipt($salesData, $salesTransactionDetail) {
        $receipt = "=== SALES RECEIPT ===\n";
        $receipt .= "Transaction Code: " . $salesData['sales_transaction_code'] . "\n";
        $receipt .= "Date: " . $salesData['sales_transaction_date'] . "\n";
        
        $receipt .= "\n=== ITEMS ===\n";
        $receipt .= "Product Name | Qty | Price | Subtotal\n";
        foreach ($salesTransactionDetail as $detail) {
            $receipt .= $detail['product_name'] . " | " . $detail['quantity'] . " | " . $detail['sell_price'] . " | " . $detail['subtotal'] . "\n";
        }
    
        $receipt .= "\n=== PAYMENT INFO ===\n";
        $receipt .= "Total: " . $salesData['total'] . "\n";
        $receipt .= "Paid: " . $salesData['paid'] . "\n";
        $receipt .= "Change: " . $salesData['change'] . "\n";
    
        return $receipt;
    }

    public function processSale() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['quantity'], $_POST['paid'], $_POST['user_id'])) {
                $salesTransaction = new SalesTransaction();
                $salesTransactionDetail = new SalesTransactionDetail();
                
                $sales_transaction_code = "TRANSACTION-" . strval(rand(100000, 999999));
                
                $totalAmount = 0;
    
                foreach ($_POST['quantity'] as $productId => $quantity) {
                    $product = new Product();
                    $productData = $product->getDataById($productId); 
                    $productPrice = isset($productData['sell_price']) ? $productData['sell_price'] : 0; 
    
                    $detailData = [
                        'sales_transaction_code' => $sales_transaction_code,
                        'product_id' => $productId,
                        'sell_price' => $productPrice,
                        'quantity' => $quantity,
                        'subtotal' => $quantity * $productPrice,
                    ];
    
                    $totalAmount += $detailData['subtotal'];
                    $salesTransactionDetail->create($detailData);
    
                    $updatedStock = $productData['stock'] - $quantity;
    
                    $updateStockData = [
                        'product_id' => $productId,
                        'stock' => $updatedStock,

                    ];
    
                    $product->updateStock($updateStockData);
                }
    
                $salesData = [
                    'sales_transaction_date' => date('Y-m-d'), 
                    'sales_transaction_code' => $sales_transaction_code,
                    'total' => $totalAmount,
                    'paid' => $_POST['paid'],
                    'change' => $_POST['paid'] - $totalAmount,
                    'user_id' => $_POST['user_id'],
                ];
                
                $salesTransaction->create($salesData);

                $salesTransactionDetailData = $salesTransactionDetail->getDataByTransactionCode($sales_transaction_code); 
                self::generateReceipt($salesData, $salesTransactionDetailData);
    
                header('Location: /cashier/sales');
                exit();
            } else {
                echo "Missing required data.";
            }
        } else {
            echo "Invalid request method.";
        }
    }


    
    
    
    
    
}

?>