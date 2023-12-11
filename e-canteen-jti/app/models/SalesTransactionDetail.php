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

    public function getAll() {
        $query = "SELECT * FROM SalesTransactionDetail";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $row;
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
    

}

?>