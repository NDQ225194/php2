<?php
require_once "models/User.php";

class AuthController {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name  = $_POST['name'];
            $email = $_POST['email'];
            $pass  = md5($_POST['password']); // đơn giản cho bài học

            $user = new User();

            if ($user->checkEmail($email) > 0) {
                $error = "Email đã tồn tại";
            } else {
                $user->register($name, $email, $pass);
                header("location:index.php?controller=auth&action=login");
                exit;
            }
        }

        require "views/client/register.php";
    }

    public function login() {
        require "views/client/login.php";
    }
}
