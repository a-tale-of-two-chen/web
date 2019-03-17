<html lang="UTF-8">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <!--指定解码方式为UTF-8-->
    <title>mysql-test</title>
</head>
<body>
<?php
header("content-type: text/html; charset=utf-8");      //设置PHP的编码UTF-8
$servername = "localhost";
$username = "root";
$password = "51130012cyc";

// 创建连接
$db = new mysqli($servername, $username, $password);
//设置数据的字符集utf-8
mysqli_query($db,"set names'utf8'");

// 检测连接
if (mysqli_connect_errno()) {
    die("连接失败,请重新尝试。" );
}
$term = "三体";
$query = 'select * from  Book.books where name = ? limit 10';
$stmt  = $db->prepare($query);
$stmt->bind_param('s',$term);
$stmt->execute();
$stmt->bind_result($ID,$name,$author,$score,$syno,$site);
while ($stmt->fetch()){
    echo "<p>序号:".$ID."<br> ".$name."   简介："."<br>".$syno."<br></p>";
}
$db->close();
?>
</body>
</html>



