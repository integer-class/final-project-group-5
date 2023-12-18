<?php

namespace models;
require_once '../app/config/Connection.php';
use config\Connection;
require_once 'MasterData.php';
use models\MasterData;

class SalesTransactionDetail extends MasterData {
    private $sales_transaction_detail_id;
    private $sales_transaction_id;
    private $product_id;
    private $quantity;
    private $unit_price;
    private $subtotal;
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    // Metode setter
    public function setSalesTransactionDetailId($sales_transaction_detail_id) {
        $this->sales_transaction_detail_id = $sales_transaction_detail_id;
    }
    public function setSalesTransactionId($sales_transaction_id) {
        $this->sales_transaction_id = $sales_transaction_id;
    }
    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    public function setUnitPrice($unit_price) {
        $this->unit_price = $unit_price;
    }
    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    // Metode getter
    public function getSalesTransactionDetailId() {
        return $this->sales_transaction_detail_id;
    }
    public function getSalesTransactionId() {
        return $this->sales_transaction_id;
    }
    public function getProductId() {
        return $this->product_id;
    }
    public function getQuantity() {
        return $this->quantity;
    }
    public function getUnitPrice() {
        return $this->unit_price;
    }
    public function getSubtotal() {
        return $this->subtotal;
    }

    public function getAll() {
        $query = "SELECT std.*, p.product_name
        FROM SalesTransactionDetail AS std
        JOIN Product AS p ON p.product_id = std.product_id";
        $result = mysqli_query($this->connect, $query);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $salesTransactionDetails = [];
        foreach ($rows as $row) {
            $salesTransactionDetail = new SalesTransactionDetail();
            $salesTransactionDetail->setSalesTransactionDetailId($row['sales_transaction_detail_id']);
            $salesTransactionDetail->setSalesTransactionId($row['sales_transaction_id']);
            $salesTransactionDetail->setProductId($row['product_id']);
            $salesTransactionDetail->setQuantity($row['quantity']);
            $salesTransactionDetail->setUnitPrice($row['unit_price']);
            $salesTransactionDetail->setSubtotal($row['subtotal']);
            $salesTransactionDetails[] = $salesTransactionDetail;
        }
        return $salesTransactionDetails;
    }

    public function create($data) {
        $query = "INSERT INTO SalesDetail (sales_transaction_code, sales_transaction_id,  product_id, quantity, unit_price, subtotal)
                    SELECT 
                        ? AS sales_transaction_code,
                        ? AS sales_transaction_id,
                        ? AS product_id,
                        ? AS quantity,
                        p.sell_price AS unit_price,
                        ? * p.sell_price AS subtotal
                    FROM Product AS p
                    WHERE p.product_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'siiidi', $data['sales_transaction_code'], $data['sales_transaction_id'], $data['product_id'], $data['quantity'], $data['quantity'], $data['product_id']);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function getDataByTransactionCode($transaction_code) {
        $query = "SELECT std.*, p.product_name
        FROM SalesDetail AS std
        JOIN Product AS p ON p.product_id = std.product_id
        WHERE sales_transaction_code = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 's', $transaction_code);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    

}

?>