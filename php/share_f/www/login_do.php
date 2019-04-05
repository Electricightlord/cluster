<?php
include_once "database/mysql.php";
$instance = MySql::getInstance();
@$username = $_POST["username"];
@$password = $_POST["password"];
var_dump($_POST);
if ($username == null || $password == null) {
    echo "请填写账户名或者密码";
    exit();
}
$user = $instance->findUserByUsernameAndPassword($username);
if ($user == null || $user["password"] != $password) {
    echo "用户名或者密码错误";
} else {
    $_SESSION["user"] = $user;
    header("Location:index.php");
    exit;
}