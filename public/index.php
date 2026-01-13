<?php
$controllers = $_GET['controllers'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$controllerName = ucfirst($controllers) . 'Controller';
require "../controllers/$controllerName.php";

$app = new $controllerName();
$app->$action();
