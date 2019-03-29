<?php
/**
 * Created by PhpStorm.
 * User: lihao
 * Date: 19-3-25
 * Time: 下午12:59
 */
include_once "dao/User.php";
include_once "database/mysql.php";
include_once "database/redis.php";
ini_set("session.save_handler", "redis");
ini_set("session.save_path", "tcp://172.18.0.7:6379");
session_start();