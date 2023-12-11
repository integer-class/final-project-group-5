<?php

namespace models;
require_once '../app/config/Connection.php';
use config\Connection;
require_once 'MasterData.php';
use models\MasterData;

class SalesTransaction extends MasterData {
    private $sales_transaction_id;
    private $sales_transaction_date;
    private $total;
    private $paid;
    private $change;
    private $user_id;
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    public function getAll() {
        $query = "SELECT * FROM Sales";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $row;
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
        $query = "SELECT * FROM Sales WHERE sales_transaction_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    
   
}

?>