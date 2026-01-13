<?php
session_start();
$conn = new mysqli("localhost", "root", "", "thiet_bi_ve_sinh");
$conn->set_charset("utf8");
