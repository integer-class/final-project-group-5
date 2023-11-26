<?php 

namespace models;
require_once '../app/config/Connection.php';
use config\Connection;

class UserModel {
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    public function getUserData($username, $password) {
        $query = "SELECT * FROM User WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}

?>