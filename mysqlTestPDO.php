<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/3/17
 * Time: 17:18
 */
header('content-type:text/html;charset=utf8');
//连接数据库
$dsn="mysql:dbname=Book;host=127.0.0.1";
//数据库的用户名
$user="root";
//数据库的密码
$password="root";
//生成PDO对象
$object = new PDO($dsn,$user,$password);

// 检测连接
if ($object->connect_errno  ) {
	printf("连接失败,请重新尝试。",$db->connect_error );
	exit();
}
//设置数据的字符集utf-8
mysqli_query($object,"set names'utf8'");


echo "成功连接<br>";

$term = "三体";
$query = 'select * from  Book.books where name = ? limit 10';
$stmt  = $object->prepare($query);
$stmt->bind_param('s',$term);
$stmt->execute();
$stmt->bind_result($ID,$name,$author,$score,$syno,$site);
while ($stmt->fetch()){
	echo "<p>序号:".$ID."<br> ".$name."   简介："."<br>".$syno."<br></p>";
}
$object->close();
?>