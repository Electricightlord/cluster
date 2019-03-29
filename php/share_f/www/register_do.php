<?php
include_once "database/mysql.php";
$instance = MySql::getInstance();
$username = $_POST["username"];
$password = $_POST["password"];
$user = $instance->addUser($username, $password);
if ($user == null) {
    echo "注册失败";
} else {
    $_SESSION["user"] = $user;
    header("Location:index.php");
    exit;
}