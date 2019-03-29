<?php
/**
 * Created by PhpStorm.
 * User: lihao
 * Date: 19-3-25
 * Time: 下午1:20
 */
include_once "common.php";

class MySql
{
    public static $instance;
    private $pdo;

    private function __construct()
    {
        $configFilePath = dirname(__FILE__) . "/mysql.json";
        $json = json_decode(file_get_contents($configFilePath), true);
        $dsn = sprintf("mysql:dbname=%s;host=%s:%d", $json["dbname"], $json["host"], $json["port"]);
        try {
            $pdo = new PDO($dsn, $json["user"], $json["password"]);
            $this->pdo = $pdo;
            return $this;
        }
        catch (PDOException $exception) {
            echo "数据库连接失败:" . $exception->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new MySql();
        }
        return self::$instance;
    }

    public function addUser($username, $password)
    {
        $searchSql = "select * from user where username=:username";
        $stmt = self::$instance->pdo->prepare($searchSql);
        $stmt->bindParam(":username",$username);
        if ($stmt->execute()) {
            return null;
        }
        $insertSql = "insert into user (`username`,`password`) values(:username,:password)";
        $stmt = self::$instance->pdo->prepare($insertSql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        if ($stmt->execute()) {
            return new User($username, $password);
        } else {
            return null;
        }
    }

    public function findUserByUsernameAndPassword($username, $password)
    {
        $sql = "select * from user where username= :username and password=:password";
        $stmt = self::$instance->pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        if (!$stmt->execute()) {
            return null;
        } else {
            $userInfoArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($userInfoArray) == 1) {
                return new User($userInfoArray[0]["username"], $userInfoArray[0]["password"]);
            } else {
                return null;
            }
        }
    }
}