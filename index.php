﻿<?php
    session_start();
    if(isset($_SESSION['name'])){
        echo"<h2>请先登录。</h2>";
        exit();
    }
    $name=$_SESSION['name']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include './header.php';
    ?>
    <title>项目主界面</title>
</head>
<body>
<h2>你好！<?php echo $name?></h2>
<h2>从以下列表选取访问:</h2>
<br>
<ul id="main"></ul>
<li>
    <a href="/index.php">wordpress更新说明</a>
</li>
<li>
    <a href="/web/book/index.php">图书查询系统</a>
</li>
<p>by 陈南华</p>

<?php
include 'footer.php';
?>
</body>
</html>
