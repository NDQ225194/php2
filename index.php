<?php
// Hiển thị lỗi để debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Lấy controller & action
$controller = $_GET['controller'] ?? 'home';
$action     = $_GET['action'] ?? 'index';

// Chuẩn hóa tên controller
$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = __DIR__ . "/controllers/$controllerName.php";

// Kiểm tra controller tồn tại
if (!file_exists($controllerFile)) {
    die("❌ Không tìm thấy controller: $controllerName");
}

require_once $controllerFile;

// Kiểm tra class
if (!class_exists($controllerName)) {
    die("❌ Class $controllerName không tồn tại");
}

$ctr = new $controllerName();

// Kiểm tra action
if (!method_exists($ctr, $action)) {
    die("❌ Action $action không tồn tại");
}

// Gọi action
$ctr->$action();
