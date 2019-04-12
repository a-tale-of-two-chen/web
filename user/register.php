<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/4/5
 * Time: 18:13
 */

session_start();
@$register = $_GET['register'];

if ($register != "register") {      //如果不是login发来的注册请求,执行录入数据库
    $flag             = $_POST['flag'];
    $name             = $_POST['name'];
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    @$mail = $_POST['mail'];

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
            echo "<meta charset='UTF-8' http-equiv=\"refresh\" content=\"1;url=/web/index.php\">";
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="utf-8">
<head>
    <?php
    include '../header.php';
    ?>
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="./user.css">
</head>
<body>
<div class="container">
    <!-- 导航 -->
    <div class="nav">
        <ul>
            <li><a href="http://cscnh.cn">返回主界面</a></li>
        </ul>
    </div>

    <!-- 主体内容 （登陆界面）-->
    <div class="main">
        <!-- 左侧信息栏 -->
        <div class="sideleft">
            <h1>苏小小墓</h1>
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[作者]&nbsp;李贺</h4>
            <br>
            <p>幽兰露，如啼眼。无物结同心，烟花不堪剪。</p>
            <p>草如茵，松如盖。风为裳，水为珮。</p>
            <p>油壁车，夕相待。冷翠烛，劳光彩。</p>
            <p>西陵下，风吹雨。</p>

        </div>
        <!-- 右侧登陆界面 -->
        <div class="sideright">
            <div class="index">
                <form action="register.php" method="post">
                    <p class="headline">用户注册</p>
                    <p class="astyle">用户名：</p>
                    <input name="name" type="text" placeholder="请输入您的用户名（允许中文名）" required>
                    <p class="astyle">密码：</p>
                    <input name="password" id="password" type="password" placeholder="请输入密码" required>
                    <p class="astyle">确认密码：</p>
                    <input name="confirm_password" id="confirm_password" type="password" placeholder="请再次输入密码"
                           required>
                    <p class="astyle">邮箱：</p>
                    <input name="mail" id="mail" type="text" placeholder="请输入邮箱" required pattern=".*@.*">
                    <input type="hidden" name="flag" value="register">
                    <input type="submit" value="注册" name="login">
                </form>
            </div>
        </div>
    </div>

    <!-- 尾部 -->
    <div class="footer">
        <ul>
            <li>
                <pre></pre>
            </li>
            <li>powered by cscnh.cn|</li>
            <li>2018 © Charon</li>
        </ul>

    </div>

</div>
</body>
</html>


