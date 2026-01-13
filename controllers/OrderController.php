<?php
require_once __DIR__ . '/../models/Order.php';

class OrderController {

    public function checkout() {
        $cart = $_SESSION['cart'] ?? [];
        if(empty($cart)){
            echo "<p>Giỏ hàng trống. <a href='index.php?controller=product&action=index'>Quay lại mua hàng</a></p>";
            return;
        }
        require_once __DIR__ . '/../views/order/checkout.php';
    }

    public function process() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address']
            ];

            $cart = $_SESSION['cart'] ?? [];

            $orderModel = new Order();
            $order_id = $orderModel->create($data, $cart);

            // Xóa giỏ hàng sau khi đặt
            unset($_SESSION['cart']);

            echo "<p>Đặt hàng thành công! Mã đơn hàng: <b>#{$order_id}</b></p>";
            echo "<p><a href='index.php?controller=product&action=index'>Tiếp tục mua hàng</a></p>";
        }
    }
    public function myOrders(){
    $model = new Oder();
    $orders = $model->getByUser($_SESSION['user']['id']);
    require 'views/product/oder/myorders.php';
}

}
