<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/3/20
 * Time: 23:19
 * 第一阶段的完整代码
 */
if(isset($_GET['search'])){
	$search = trim($_GET['search']);
}else{
	echo "<p>请输入正确参数</p>";
}


$db = new mysqli('127.0.0.1','root','51130012cyc','book');
if(mysqli_connect_error()){
	echo "<p> Mysql无连接，请稍后尝试。</p><br>".
		"感谢你的使用。";
	exit();
}
$query = "select * from books where Name = ? or ID = ? or Author = ? or Score = ? or Syno = ? or Site = ? ";
mysqli_query($db,"set names'utf8'");
$stmt = $db->prepare($query);
$stmt->bind_param('ssssss',$search,$search,$search,$search,$search,$search);
$stmt->execute();
$stmt->bind_result($ID,$Name,$Author,$Score,$Syno,$Site);
?>
<!DOCTYPE html>
<html>
<head>
	<title>结果集</title>
</head>
<body>
<h1>查询结果：</h1>
<br>
<table border="1">
	<tr>
		<td>编号</td>
		<td>书名</td>
		<td>作者</td>
		<td>评分</td>
		<td width="700px">简介</td>
		<td>网址</td>
	</tr>
<?php
//echo "一共得到".str($stmt.num_rows)."行数据<br>";
while ($stmt->fetch()){
	echo "<tr>
		  <td>$ID</td>
		  <td>$Name</td>
		  <td>$Author</td>
		  <td>$Score</td>
		  <td>$Syno</td>
		  <td><a href='$Site'>$Site</a></td>
		  </tr>";
}
$stmt->free_result();
$db->close();
?>
</table>
</body>
</html>
