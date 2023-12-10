<?php 

namespace controllers;
use models\Product;
require_once '../app/models/Product.php';
use models\SalesTransaction;
require_once '../app/models/SalesTransaction.php';
use models\SalesTransactionDetail;
require_once '../app/models/SalesTransactionDetail.php';

class Cashier {
    public function __construct() {
        Auth::checkAuth('cashier');
    }
    public function renderHome() {
        require_once '../app/views/cashier/home.php';
    }

    public function renderSales() {
        $product = new Product();
        $product_data = $product->getAll();
        require_once '../app/views/cashier/sales.php';
    }

    public function processSale($data) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $salesTransaction = new SalesTransaction();
            $salesTransactionDetail = new SalesTransactionDetail();
    
            $product = new Product();
            $productData = $product->getDataById($data['product_id']); 
            $productPrice = $productData['sell_price']; 
    
            $total = $productPrice * $data['quantity'];
    
            $salesData = [
                'sales_transaction_date' => date('Y-m-d H:i:s'), 
                'total' => $total,
                'paid' => $data['paid'],
                'change' => $total - $data['paid'],
                'user_id' => $data['user_id'],
            ];
    
            $salesTransactionId = $salesTransaction->create($salesData);
    
            if ($salesTransactionId) {
                $detailData = [
                    'sales_transaction_id' => $salesTransactionId,
                    'product_id' => $productData['product_id'],
                    'sell_price' => $productData['sell_price'],
                    'quantity' => $data['quantity'],
                    'subtotal' => $data['quantity'] * $productData['sell_price'],
                ];
    
                $salesTransactionDetail->create($detailData);
    
                header('Location: /cashier/sales');
            } else {
                echo "Failed to process sale.";
            }
        } else {
            echo "Invalid request method.";
        }
    }
    
}

?>