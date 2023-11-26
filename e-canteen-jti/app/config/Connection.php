<?php 

namespace config;

class Connection {
    public $server = "127.0.0.1";
    public $username = "root";
    public $password = "";
    public $database = "e-canteen-jti";
    public $connect;

    public function __construct() {
        $this->connect = mysqli_connect($this->server, $this->username, $this->password, $this->database);
    }
}

?>