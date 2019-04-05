<?php
include_once "common.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
    h1 {
        text-align: center;
    }
</style>
<body>
<?php
if (isset($_SESSION)) {
    @$user = $_SESSION['user'];
}
if (!isset($user)) {
    ?>
    <h1>你尚未登录,请点击<a href="login.html">登录</a>进行登录,如未注册,请点击<a href="register.html">注册</a>进行注册</h1>
    <?php
} else {
    ?>
    <h1><?php echo $user->getUsername(); ?></h1>
    <h1>欢迎使用集群demo</h1>
    <h1>nginx服务器地址:<?php echo $_SERVER["REMOTE_ADDR"]; ?></h1>
    <h1>php服务器地址:<?php echo $_SERVER["SERVER_ADDR"] ?></h1>
    <h1>redis服务器地址:<?php echo $hostAndIp["host"]; ?></h1>
    <h1>mysql服务器地址:<?php echo getJson("mysql")["host"]; ?></h1>
    <?php
}
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
?>
</body>
</html>