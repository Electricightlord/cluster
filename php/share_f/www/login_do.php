<?php
/**
 * Created by PhpStorm.
 * User: lihao
 * Date: 19-3-25
 * Time: 下午1:06
 */
include_once "database/mysql.php";
$instance = MySql::getInstance();
$username = $_POST["username"];
$password = $_POST["password"];
$user = $instance->findUserByUsernameAndPassword($username, $password);
if ($user == null) {
    echo "用户名或者密码错误";
} else {
    $_SESSION["user"] = $user;
    header("Location:index.php");
    exit;
}