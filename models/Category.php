<?php
require_once 'Database.php';

class Category extends Database {

    public function getAll() {
        return $this->conn->query("SELECT * FROM categories");
    }
}
