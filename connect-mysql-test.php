<html lang="UTF-8">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <!--指定解码方式为UTF-8-->
    <title>mysql-test</title>
</head>
<body>
<?php
//专门匹配服务器环境
echo "start:<br>";

header("content-type: text/html; charset=utf-8");      //设置PHP的编码UTF-8
$servername = "127.0.0.1";  //不要填localhost
$username = "root";
$password = "51130012cyc";

echo "开始创建连接<br>";

// 创建连接
$db = new mysqli($servername, $username, $password,book);

// 检测连接
if ($db->connect_errno  ) {
	printf("连接失败,请重新尝试。",$db->connect_error );
	exit();
}
//设置数据的字符集utf-8
mysqli_query($db,"set names'utf8'");


echo "成功连接<br>";

$term = "三体";
$query = 'select * from  book.books where Name = ? limit 10';
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



