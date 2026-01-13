<?php
require_once "Database.php";

class User extends Database {

    public function register($name, $email, $password) {
        $sql = "INSERT INTO users(name, email, password)
                VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);
        return $stmt->execute();
    }

    public function checkEmail($email) {
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->num_rows;
    }
}
