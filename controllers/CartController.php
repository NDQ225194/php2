<?php
// CartController.php
require_once __DIR__ . '/../models/Product.php';

class CartController {

    // Xem giỏ hàng
    public function index() {
        $cart = $_SESSION['cart'] ?? [];
        require_once __DIR__ . '/../views\product/cart/index.php';
    }

    // Thêm sản phẩm vào giỏ
    public function add() {
        if (!isset($_GET['id'])) {
            header("Location: index.php?controller=product&action=index");
            exit;
        }

        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->find($id);

        if ($product) {
            if (!isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] = [
                    'name'  => $product['name'],
                    'price' => $product['price'],
                    'qty'   => 1,
                    'image' => $product['image']
                ];
            } else {
                $_SESSION['cart'][$id]['qty']++;
            }
        }

        header("Location: index.php?controller=cart&action=index");
        exit;
    }

    // Xóa sản phẩm khỏi giỏ
    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);
            }
        }

        header("Location: index.php?controller=cart&action=index");
        exit;
    }

    // Cập nhật số lượng
    public function update() {
        if (isset($_POST['qty']) && is_array($_POST['qty'])) {
            foreach ($_POST['qty'] as $id => $qty) {
                if ($qty > 0) {
                    $_SESSION['cart'][$id]['qty'] = $qty;
                } else {
                    // Nếu số lượng <=0 thì xóa khỏi giỏ
                    unset($_SESSION['cart'][$id]);
                }
            }
        }

        header("Location: index.php?controller=cart&action=index");
        exit;
    }

    // Xóa toàn bộ giỏ hàng (tùy chọn)
    public function clear() {
        unset($_SESSION['cart']);
        header("Location: index.php?controller=cart&action=index");
        exit;
    }
}
