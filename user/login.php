<!DOCTYPE html>
<html>
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
            </br>
            <p>幽兰露，如啼眼。无物结同心，烟花不堪剪。</p>
            <p>草如茵，松如盖。风为裳，水为珮。</p>
            <p>油壁车，夕相待。冷翠烛，劳光彩。</p>
            <p>西陵下，风吹雨。</p>

        </div>
        <!-- 右侧登陆界面 -->
        <div class="sideright">
            <div class="index">
                <form action="confirm.php" method="post">
                    <p class="headline">用户登陆</p>
                    <p class="astyle">用户名：</p>
                    <input name="name" type="text" placeholder="请输入您的用户名" required>
                    <p class="astyle">密码：</p>
                    <input name="password" id="password" type="password" placeholder="请输入密码" required>
                    <input type="hidden" name="flag" value="login" required>
                    <input type="submit" value="登陆" name="login">
                    </br>
                    <p class="bstyle"><input type="checkbox" name="rempas" />  记住密码</p>
                    <p class="cstyle"><a href="forget.php">忘记密码</a> </p>
                    </br></br>
                    <p class="cstyle">没有账号？<a href="register.php">立即注册</a></p>
                </form>

            </div>
        </div>
    </div>

    <!-- 尾部 -->
    <div class="footer">
        <ul>
            <li><pre>                                                             </pre></li>
            <li>powered by cscnh.cn|</li>
            <li>2018 © Charon</li>
        </ul>

    </div>

</div>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/3/31
 * Time: 22:04
 */
