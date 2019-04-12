<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/4/5
 * Time: 18:13
 */

session_start();

$flag             = $_POST['flag'];
$name             = $_POST['name'];
$password         = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
@$mail = $_POST['mail'];        //一个页面处理三个请求......
$number = "";

//验证两次密码是一致
if ($password != $confirm_password) {
    echo "<h1>两次密码不一致</h1>";
    echo "<a href='./register.php'>返回</a>";
    exit();
}

//hash加密
$password_hash = password_hash($password, 1);

//开启数据库连接,选择数据库
include '../mysql.php';
$db->select_db('user');

if (isset($_POST['mail'])) {
    $query = "insert into users values (?,?,?,?)";
    $stmt  = $db->prepare($query);
    $stmt->bind_param('dsss', $number, $name, $password_hash, $mail);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION["name"] = $name;
        echo "<h1>注册成功!</h1>";
        echo "<meta charset='UTF-8' http-equiv=\"refresh\" content=\"3;url=/web/index.php\">";

    }
}


