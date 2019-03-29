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

$sentinel = Sentinel::getSentinelInstance();
$hostAndIp = $sentinel->getHostAndPort();

ini_set("session.save_handler", "redis");
ini_set("session.save_path", "tcp://{$hostAndIp["host"]}:{$hostAndIp["port"]}");
session_start();

function getJson($jsonFileName)
{
    $configFilePath = dirname(__FILE__) . "/database" . "/{$jsonFileName}.json";
    $json = json_decode(file_get_contents($configFilePath), true);
    return $json;
}