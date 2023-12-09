<?php 

namespace models;
require_once '../app/config/Connection.php';
use config\Connection;
require_once 'MasterData.php';
use models\MasterData;

class Product extends MasterData {
    private $product_id;
    private $product_name;
    private $supplier_name;
    private $description;
    private $category;
    private $stock;
    private $buy_price;
    private $sell_price;
    private $image;
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    public function getAll() {
        $query = "SELECT * FROM Product";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $row;
    }

    public function create($data) {
        $query = "INSERT INTO Product (product_name, supplier_name, description, category, stock, buy_price, sell_price, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'ssssssss', $data['product_name'], $data['supplier_name'], $data['description'], $data['category'], $data['stock'], $data['buy_price'], $data['sell_price'], $data['image']);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function update($data) {
        $query = "UPDATE Product SET product_name = ?, supplier_name = ?, description = ?, category = ?, stock = ?, buy_price = ?, sell_price = ?, image = ? WHERE product_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'ssssssssi', $data['product_name'], $data['supplier_name'], $data['description'], $data['category'], $data['stock'], $data['buy_price'], $data['buy_price'], $data['image'], $data['product_id']);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function delete($product_id) {
        $query = "DELETE FROM Product WHERE product_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'i', $product_id);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function getDataById($product_id) {
        $query = "SELECT * FROM Product WHERE product_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'i', $product_id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

}

?>