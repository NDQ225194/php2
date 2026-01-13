<?php

class HomeController
{
    public function index()
    {
        // load model
        require_once __DIR__ . '/../models/Product.php';

        $product = new Product();

        // phân trang
        $page  = $_GET['page'] ?? 1;
        $limit = 6;
        $offset = ($page - 1) * $limit;

        $products = $product->getAll($limit, $offset);
        $total    = $product->countAll();
        $totalPages = ceil($total / $limit);

        // load view
        require __DIR__ . '/../views/home.php';
    }
}
