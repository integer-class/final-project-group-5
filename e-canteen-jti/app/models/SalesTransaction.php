<?php

namespace models;
require_once '../app/config/Connection.php';
use config\Connection;
require_once 'MasterData.php';
use models\MasterData;

class SalesTransaction extends MasterData {
    private $sales_transaction_id;
    private $sales_transaction_date;
    private $sales_transaction_code;
    private $total;
    private $paid;
    private $change;
    private $user_id;
    private $username;
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    // Metode setter
    public function setSalesTransactionId($sales_transaction_id) {
        $this->sales_transaction_id = $sales_transaction_id;
    }
    public function setSalesTransactionCode($sales_transaction_code) {
        $this->sales_transaction_code = $sales_transaction_code;
    }
    public function setSalesTransactionDate($sales_transaction_date) {
        $this->sales_transaction_date = $sales_transaction_date;
    }
    public function setTotal($total) {
        $this->total = $total;
    }
    public function setPaid($paid) {
        $this->paid = $paid;
    }
    public function setChange($change) {
        $this->change = $change;
    }
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
    public function setUsername($username) {
        $this->username = $username;
    }

    // Metode getter
    public function getSalesTransactionId() {
        return $this->sales_transaction_id;
    }
    public function getSalesTransactionCode() {
        return $this->sales_transaction_code;
    }
    public function getSalesTransactionDate() {
        return $this->sales_transaction_date;
    }
    public function getTotal() {
        return $this->total;
    }
    public function getPaid() {
        return $this->paid;
    }
    public function getChange() {
        return $this->change;
    }
    public function getUserId() {
        return $this->user_id;
    }
    public function getUsername() {
        return $this->username;
    }

    public function getAll() {
        $query = "SELECT s.*, u.username
        FROM Sales AS s
        JOIN User AS u ON u.user_id = s.user_id";
        $result = mysqli_query($this->connect, $query);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $sales = [];
        foreach ($rows as $row) {
            $sales_transaction = new SalesTransaction();
            $sales_transaction->setSalesTransactionId($row['sales_transaction_id']);
            $sales_transaction->setSalesTransactionCode($row['sales_transaction_code']);
            $sales_transaction->setSalesTransactionDate($row['sales_transaction_date']);
            $sales_transaction->setTotal($row['total']);
            $sales_transaction->setPaid($row['paid']);
            $sales_transaction->setChange($row['change']);
            $sales_transaction->setUserId($row['user_id']);
            $sales_transaction->setUsername($row['username']);
            $sales[] = $sales_transaction;
        }
        return $sales;
    }

    public function create($data) {
        $query = "INSERT INTO Sales (sales_transaction_date, sales_transaction_code, total, paid, `change`, user_id)
        SELECT CONVERT_TZ(NOW(), '+00:00', '+07:00'),
        ?, ?, ?, ?, ?";
        $statement = mysqli_prepare($this->connect, $query);    
        mysqli_stmt_bind_param($statement, 'sdddi',$data['sales_transaction_code'], $data['total'], $data['paid'], $data['change'], $data['user_id']);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function getDataById($id) {
        $query = "SELECT s.*, u.username
        FROM Sales AS s
        JOIN User AS u ON u.user_id = s.user_id
        WHERE sales_transaction_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $sales_transaction = new SalesTransaction();
            $sales_transaction->setSalesTransactionId($row['sales_transaction_id']);
            $sales_transaction->setSalesTransactionCode($row['sales_transaction_code']);
            $sales_transaction->setSalesTransactionDate($row['sales_transaction_date']);
            $sales_transaction->setTotal($row['total']);
            $sales_transaction->setPaid($row['paid']);
            $sales_transaction->setChange($row['change']);
            $sales_transaction->setUserId($row['user_id']);
            $sales_transaction->setUsername($row['username']);
            return $sales_transaction;
        }
        return null;
    }

    public function getDataByDate($date) {
        $query = "SELECT s.*, u.username
        FROM Sales AS s
        JOIN User AS u ON u.user_id = s.user_id
        WHERE DATE(sales_transaction_date) = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 's', $date);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $sales = [];
        foreach ($rows as $row) {
            $sales_transaction = new SalesTransaction();
            $sales_transaction->setSalesTransactionId($row['sales_transaction_id']);
            $sales_transaction->setSalesTransactionCode($row['sales_transaction_code']);
            $sales_transaction->setSalesTransactionDate($row['sales_transaction_date']);
            $sales_transaction->setTotal($row['total']);
            $sales_transaction->setPaid($row['paid']);
            $sales_transaction->setChange($row['change']);
            $sales_transaction->setUserId($row['user_id']);
            $sales_transaction->setUsername($row['username']);
            $sales[] = $sales_transaction;
        }
        return $sales;
    }
    
   
}

?>