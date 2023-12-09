<?php 

namespace models;
require_once '../app/config/Connection.php';
use config\Connection;

class User {
    private $user_id;
    private $username;
    private $password;
    private $email;
    private $role;
    private $address;
    private $phone_number;
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    public function getUserDataLogin($username, $password) {
        $query = "SELECT * FROM User WHERE username = ? AND password = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'ss', $username, $password);
        mysqli_stmt_execute($statement);
        $result =  mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($statement);
        return $row;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM User";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $row;
    }

    public function createUser($username, $password, $email, $role, $address, $phone_number) {
        $query = "INSERT INTO User (username, password, email, role, address, phone_number) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'ssssss', $username, $password, $email, $role, $address, $phone_number);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function updateUser($user_id, $username, $password, $email, $role, $address, $phone_number) {
        $query = "UPDATE User SET username = ?, password = ?, email = ?, role = ?, address = ?, phone_number = ? WHERE user_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'ssssssi', $username, $password, $email, $role, $address, $phone_number, $user_id);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function deleteUser($user_id) {
        $query = "DELETE FROM User WHERE user_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'i', $user_id);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function getUserById($user_id) {
        $query = "SELECT * FROM User WHERE user_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'i', $user_id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}

?>