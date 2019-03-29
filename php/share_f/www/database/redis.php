<?php
/**
 * Created by PhpStorm.
 * User: lihao
 * Date: 19-3-25
 * Time: 下午1:20
 */
include_once "common.php";

class Sentinel
{
    public static $sentinelInstance;
    private $redis;

    private function __construct()
    {
        $json = getJson("sentinel");
        $redis = new Redis();
        if ($redis->connect($json["host"], $json["port"])) {
            $this->redis = $redis;
        }
        return $this;
    }

    public static function getSentinelInstance()
    {
        if (self::$sentinelInstance == null) {
            self::$sentinelInstance = new Sentinel();
        }
        return self::$sentinelInstance;
    }

    public function getHostAndPort()
    {
        $result = $this->redis->rawCommand('sentinel', 'get-master-addr-by-name', 'mymaster');
        return ['host' => $result[0], 'port' => $result[1]];
    }
}

class RRedis
{
    public static $redisInstance;

    public static function getRedisInstance($ip)
    {
        if (self::$redisInstance == null) {
            self::$redisInstance = new RRedis($ip);
        }
    }
}