<?php 

namespace models;
require_once '../app/config/Connection.php';
use config\Connection;
require_once 'MasterData.php';
use models\MasterData;

class Product extends MasterData {
    private $product_id;
    private $product_code;
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

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function setProductCode($product_code) {
        $this->product_code = $product_code;
    }

    public function getProductCode() {
        return $this->product_code;
    }

    public function setProductName($product_name) {
        $this->product_name = $product_name;
    }

    public function getProductName() {
        return $this->product_name;
    }

    public function setSupplierName($supplier_name) {
        $this->supplier_name = $supplier_name;
    }

    public function getSupplierName() {
        return $this->supplier_name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setBuyPrice($buy_price) {
        $this->buy_price = $buy_price;
    }

    public function getBuyPrice() {
        return $this->buy_price;
    }

    public function setSellPrice($sell_price) {
        $this->sell_price = $sell_price;
    }

    public function getSellPrice() {
        return $this->sell_price;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }

    public function getAll() {
        $query = "SELECT * FROM Product";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $products = [];
        foreach ($row as $data) {
            $product = new Product();
            $product->setProductId($data['product_id']);
            $product->setProductCode($data['product_code']);
            $product->setProductName($data['product_name']);
            $product->setSupplierName($data['supplier_name']);
            $product->setDescription($data['description']);
            $product->setCategory($data['category']);
            $product->setStock($data['stock']);
            $product->setBuyPrice($data['buy_price']);
            $product->setSellPrice($data['sell_price']);
            $product->setImage($data['image']);
            $products[] = $product;
        }
        return $products;
    }

    public function getDataById($product_id) {
        $query = "SELECT * FROM Product WHERE product_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'i', $product_id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $product = new Product();
            $product->setProductId($row['product_id']);
            $product->setProductCode($row['product_code']);
            $product->setProductName($row['product_name']);
            $product->setSupplierName($row['supplier_name']);
            $product->setDescription($row['description']);
            $product->setCategory($row['category']);
            $product->setStock($row['stock']);
            $product->setBuyPrice($row['buy_price']);
            $product->setSellPrice($row['sell_price']);
            $product->setImage($row['image']);
            return $product;
        }
        return null;
    }

    public function getDataByName($product_name) {
        $query = "SELECT * FROM Product WHERE product_name = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 's', $product_name);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $products = [];
        foreach ($data as $row) {
            $product = new Product();
            $product->setProductId($row['product_id']);
            $product->setProductCode($row['product_code']);
            $product->setProductName($row['product_name']);
            $product->setSupplierName($row['supplier_name']);
            $product->setDescription($row['description']);
            $product->setCategory($row['category']);
            $product->setStock($row['stock']);
            $product->setBuyPrice($row['buy_price']);
            $product->setSellPrice($row['sell_price']);
            $product->setImage($row['image']);
            $products[] = $product;
        }
        return $products;
    }

    public function create($data) {
        $query = "INSERT INTO Product (product_code, product_name, supplier_name, description, category, stock, buy_price, sell_price, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'sssssssss', $data['product_code'], $data['product_name'], $data['supplier_name'], $data['description'], $data['category'], $data['stock'], $data['buy_price'], $data['sell_price'], $data['image']);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function update($data) {
        $query = "UPDATE Product SET product_code = ?, product_name = ?, supplier_name = ?, description = ?, category = ?, stock = ?, buy_price = ?, sell_price = ?, image = ? WHERE product_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'sssssssssi', $data['product_code'], $data['product_name'], $data['supplier_name'], $data['description'], $data['category'], $data['stock'], $data['buy_price'], $data['sell_price'], $data['image'], $data['product_id']);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function updateStock($data) {
        $query = "UPDATE Product SET stock = ? WHERE product_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'ii', $data['stock'], $data['product_id']);
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

}

?>