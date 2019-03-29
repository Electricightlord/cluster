<?php
/**
 * Created by PhpStorm.
 * User: lihao
 * Date: 19-3-25
 * Time: 下午4:22
 */
include_once "common.php";
$user = new User("lihao", "123");
$_SESSION["user"] =$user;