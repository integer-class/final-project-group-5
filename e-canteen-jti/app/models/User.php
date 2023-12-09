<?php 

namespace models;
require_once '../app/config/Connection.php';
use config\Connection;

class User {
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    public function getUserDataLogin($username, $password) {
        $query = "SELECT * FROM User WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);
        $result =  mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $row;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM User";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $row;
    }

    public function createUser($username, $password, $email, $role, $address, $phone_number) {
        $query = "INSERT INTO User (username, password, email, role, address, phone_number) VALUES ('$username', '$password', '$email', '$role', '$address', '$phone_number')";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    public function updateUser($user_id, $username, $password, $email, $role, $address, $phone_number) {
        $query = "UPDATE User SET username = '$username', password = '$password', email = '$email', role = '$role', address = '$address', phone_number = '$phone_number' WHERE user_id = '$user_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    public function deleteUser($user_id) {
        $query = "DELETE FROM User WHERE user_id = '$user_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    public function getUserById($user_id) {
        $query = "SELECT * FROM User WHERE user_id = '$user_id'";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}

?>