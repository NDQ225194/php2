<?php
require_once 'models/Product.php';
require_once 'models/Category.php';

class ProductController {

    public function index() {
        $productModel = new Product();
        $categoryModel = new Category();

        $products = $productModel->getAll();
        $categories = $categoryModel->getAll();

        require 'views/product/index.php';
    }

    public function detail() {
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->find($id);

        require 'views/product/detail.php';
    }
}
