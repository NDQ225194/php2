<?php
require_once __DIR__ . "/Database.php";

class Product {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conn; // ← FIX LỖI Ở ĐÂY
    }

    public function countAll() {
        $sql = "SELECT COUNT(*) AS total FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
}
