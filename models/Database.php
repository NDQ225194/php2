<?php
class Database {
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "thietbivesinh");
        $this->conn->set_charset("utf8");

        if ($this->conn->connect_error) {
            die("Kết nối thất bại");
        }
    }
    public function getConnection() {
        return $this->conn;
    }
}
