/**
* Created by PhpStorm.
* User: 26309
* Date: 2019/4/5
* Time: 18:14
*/
<!DOCTYPE html>
<html>
<head>
    <?php
    include '../header.php';
    ?>
    <title>忘记密码</title>
</head>
<body>
<p>
    验证码已发送至你的邮箱，请确认：
</p>
<form action="confirm.php" method="post">
    <p>新密码:</p>
    <input type="password" name="password" id="password" placeholder="请输入新密码" required>
    <p class="astyle">确认密码：</p>
    <input name="confirm-password" id="confirm-password" type="password" placeholder="请再次确认密码" required>
    <p>验证码:</p>
    <input type="text" name="code" id="code" maxlength="6" required>
    <input type="hidden" value="change" name="flag" id="flag">
    <input value="确认" type="submit">
</form>
</body>

</html>
<?php

