<?php
session_start();
if (!isset($_SESSION['name']) && !isset($_COOKIE['name'])) {
    echo "<h2>请先登录。</h2>";
    echo "<a href='/web/user/login.php'>登录</a>";
    exit();
}
//setcookie("user_name", "user_value", time()-1);       //没学懂，在报错
//if (!isset($_COOKIE['name'])) {
//    setcookie("name", $_S ESSION['name'], time() + (60 * 60 * 24 * 30));
//}
if (isset($_SESSION['name'])) $name = $_SESSION['name'];
if (isset($_COOKIE['name'])) $name = $_COOKIE['name'];

//验证用户名是否正确
@$name = $_COOKIE['name'];
include './mysql.php';
$db->select_db('user');
$query = "select password from user.users where name=?";
$stmt  = $db->prepare($query);
$stmt->bind_param('s', $name);
$stmt->execute();
$stmt->store_result();
if ($stmt->affected_rows == 0) {             //判断有没有该用户
    echo "<h1>没有该用户!</h1>";
    echo "<meta charset='UTF-8' http-equiv=\"refresh\" content=\"0.5;url=/web/user/login.php\">";
    exit();
}
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
<h2>你好！<?php echo $name ?></h2>
<h2>从以下列表选取访问:</h2>
<br>
<ul id="main"></ul>
<li>
    <a href="/index.php">wordpress更新说明</a>
</li>
<li>
    <a href="book/index.php">图书查询系统</a>
</li>
<li>
    <a href="huaji/huaji.php">滑天下之大稽</a>
</li>
<p>by 陈南华</p>

<?php
include 'footer.php';
?>
</body>
</html>
