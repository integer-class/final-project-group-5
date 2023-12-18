<?php 

namespace models;
require_once '../app/config/Connection.php';
use config\Connection;
require_once 'MasterData.php';
use models\MasterData;

class User extends MasterData {
    protected $user_id;
    protected $username;
    protected $password;
    protected $email;
    protected $role;
    protected $address;
    protected $phone_number;
    protected $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

        // Metode setter
        public function setUserId($user_id) {
            $this->user_id = $user_id;
        }
    
        public function setUsername($username) {
            $this->username = $username;
        }
    
        public function setPassword($password) {
            $this->password = $password;
        }
    
        public function setEmail($email) {
            $this->email = $email;
        }
    
        public function setRole($role) {
            $this->role = $role;
        }
    
        public function setAddress($address) {
            $this->address = $address;
        }
    
        public function setPhoneNumber($phone_number) {
            $this->phone_number = $phone_number;
        }
    
        // Metode getter
        public function getUserId() {
            return $this->user_id;
        }
    
        public function getUsername() {
            return $this->username;
        }
    
        public function getPassword() {
            return $this->password;
        }
    
        public function getEmail() {
            return $this->email;
        }
    
        public function getRole() {
            return $this->role;
        }
    
        public function getAddress() {
            return $this->address;
        }
    
        public function getPhoneNumber() {
            return $this->phone_number;
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

    public function getAll() {
        $query = "SELECT * FROM User";
        $result = mysqli_query($this->connect, $query);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $users = [];
        foreach ($rows as $row) {
            $user = new User();
            $user->setUserId($row['user_id']);
            $user->setUsername($row['username']);
            $user->setPassword($row['password']);
            $user->setEmail($row['email']);
            $user->setRole($row['role']);
            $user->setAddress($row['address']);
            $user->setPhoneNumber($row['phone_number']);
            $users[] = $user;
        }
    
        return $users;
    }

    public function getDataById($user_id) {
        $query = "SELECT * FROM User WHERE user_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'i', $user_id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);
    
        if ($row) {
            $user = new User();
            $user->setUserId($row['user_id']);
            $user->setUsername($row['username']);
            $user->setPassword($row['password']);
            $user->setEmail($row['email']);
            $user->setRole($row['role']);
            $user->setAddress($row['address']);
            $user->setPhoneNumber($row['phone_number']);
            return $user;
        }
    
        return null;
    }

    public function getDataByName($username) {
        $query = "SELECT * FROM User WHERE username = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 's', $username);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $users = [];
        foreach ($rows as $row) {
            $user = new User();
            $user->setUserId($row['user_id']);
            $user->setUsername($row['username']);
            $user->setPassword($row['password']);
            $user->setEmail($row['email']);
            $user->setRole($row['role']);
            $user->setAddress($row['address']);
            $user->setPhoneNumber($row['phone_number']);
            $users[] = $user;
        }
        return $users;
    }

    public function create($data) {
        $query = "INSERT INTO User (username, password, email, role, address, phone_number) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'ssssss', $data['username'], $data['password'], $data['email'], $data['role'], $data['address'], $data['phone_number']);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function update($data) {
        $query = "UPDATE User SET username = ?, password = ?, email = ?, role = ?, address = ?, phone_number = ? WHERE user_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'ssssssi', $data['username'], $data['password'], $data['email'], $data['role'], $data['address'], $data['phone_number'], $data['user_id']);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

    public function delete($user_id) {
        $query = "DELETE FROM User WHERE user_id = ?";
        $statement = mysqli_prepare($this->connect, $query);
        mysqli_stmt_bind_param($statement, 'i', $user_id);
        $result = mysqli_stmt_execute($statement);
        return $result;
    }

}

?>