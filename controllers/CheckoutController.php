<?php
require_once 'models/Order.php';

class CheckoutController {

    // Form thanh toán
    public function index() {
        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            header("Location: index.php");
        }
        require 'views/checkout.php';
    }

    // Xử lý đặt hàng
    public function placeOrder() {

        $cart = $_SESSION['cart'];
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $data = [
            'name'    => $_POST['name'],
            'phone'   => $_POST['phone'],
            'address' => $_POST['address'],
            'total'   => $total
        ];

        $order = new Order();
        $order->createOrder($data, $cart);

        unset($_SESSION['cart']);

        header("Location: index.php?controller=checkout&action=success");
    }

    // Thành công
    public function success() {
        require 'views/order_success.php';
    }
}
