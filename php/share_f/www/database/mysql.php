<?php
include_once "common.php";

class MySql
{
    public static $instance;
    private $masterPdo;
    private $backupPdo;

    private function __construct()
    {
        $json = getJson("mysql");
        $dsn = sprintf("mysql:dbname=%s;host=%s:%d", $json["dbname"], $json["host"], $json["port"]);
        try {
            $masterServerInfo = $json["master"];
            $backupServerInfo = $json["backup"];
            $masterPdo = new PDO($dsn, $masterServerInfo["user"], $masterServerInfo["password"]);
            $backupPdo = new PDO($dsn, $backupServerInfo["user"], $backupServerInfo["password"]);
            $this->masterPdo = $masterPdo;
            $this->backupPdo = $backupPdo;
            return $this;
        }
        catch (PDOException $exception) {
            echo "数据库连接失败:" . $exception->getMessage();
            exit();
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
        $checkUser = $this->findUserByUsernameAndPassword($username);
        if ($checkUser != null) {
            return null;
        }
        $insertSql = "insert into user (`username`,`password`) values(:username,:password)";
        $stmt = self::$instance->masterPdo->prepare($insertSql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        if ($stmt->execute()) {
            return new User($username, $password);
        } else {
            return null;
        }
    }

    public function findUserByUsernameAndPassword($username)
    {
        $sql = "select * from user where username= :username";
        $stmt = self::$instance->backupPdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        if (!$stmt->execute()) {
            return null;
        } else {
            $userInfoArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($userInfoArray[0] != null) {
                return new User($userInfoArray[0]["username"], $userInfoArray[0]["password"]);
            } else {
                return null;
            }
        }
    }
}