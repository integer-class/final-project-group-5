<?php 

namespace models;
require_once '../app/config/Connection.php';
use config\Connection;

class ProductModel {
    private $product_id;
    private $product_name;
    private $supplier_name;
    private $description;
    private $category;
    private $stock;
    private $buy_price;
    private $sell_price;
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    public function getAllProducts() {
        $query = "SELECT * FROM Product";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $this->product_id = $row['product_id'] ?? null;
        $this->product_name = $row['product_name'] ?? null;
        $this->supplier_name = $row['supplier_name'] ?? null;
        $this->description = $row['description'] ?? null;
        $this->category = $row['category'] ?? null;
        $this->stock = $row['stock'] ?? null;
        $this->buy_price = $row['buy_price'] ?? null;
        $this->sell_price = $row['sell_price'] ?? null;
        return $row;
    }

    public function createProduct($product_name, $supplier_name, $description, $category, $stock, $buy_price, $sell_price) {
        $query = "INSERT INTO Product (product_name, supplier_name, description, category, stock, buy_price, sell_price) VALUES ('$product_name', '$supplier_name', '$description', '$category', '$stock', '$buy_price', '$sell_price')";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    public function updateProduct($product_id, $product_name, $supplier_name, $description, $category, $stock, $buy_price, $sell_price) {
        $query = "UPDATE Product SET product_name = '$product_name', supplier_name = '$supplier_name', description = '$description', category = '$category', stock = '$stock', buy_price = '$buy_price', sell_price = '$sell_price' WHERE product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    public function deleteProduct($product_id) {
        $query = "DELETE FROM Product WHERE product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    public function getProductById($product_id) {
        $query = "SELECT * FROM Product WHERE product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

}

?>