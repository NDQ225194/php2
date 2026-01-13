<?php
class Order {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost','root','','web_thiet_bi_ve_sinh');
        $this->conn->set_charset("utf8");
    }

    // Thêm đơn hàng
    public function create($data, $cart) {
        $total = 0;
        foreach($cart as $item){
            $total += $item['price'] * $item['qty'];
        }

        $stmt = $this->conn->prepare("INSERT INTO orders 
            (customer_name, customer_email, customer_phone, customer_address, total_price) 
            VALUES (?,?,?,?,?)");
        $stmt->bind_param(
            "ssssd",
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['address'],
            $total
        );
        $stmt->execute();
        $order_id = $stmt->insert_id;
        $stmt->close();

        // Thêm chi tiết đơn hàng
        foreach($cart as $id => $item){
            $subtotal = $item['price'] * $item['qty'];
            $stmt = $this->conn->prepare("INSERT INTO order_details
                (order_id, product_id, product_name, price, qty, subtotal)
                VALUES (?,?,?,?,?,?)");
            $stmt->bind_param(
                "iisidi",
                $order_id,
                $id,
                $item['name'],
                $item['price'],
                $item['qty'],
                $subtotal
            );
            $stmt->execute();
            $stmt->close();
        }

        return $order_id;
    }
}
