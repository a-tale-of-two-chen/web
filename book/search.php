<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/3/20
 * Time: 23:19
 * 第一阶段的完整代码
 */

header("content-type:text/html;charset=utf-8");
//连接数据库
$db = new mysqli('127.0.0.1', 'root', '51130012cyc', 'book');
if (mysqli_connect_error()) {
    echo "<h3> Mysql无连接，请稍后尝试。</h3><br>" .
        "感谢你的使用。";
    exit();
}
//判断输入
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $范围     = trim($_GET['范围']);
} else {
    echo "<p>请输入正确参数</p>";
}
//分别指定不同流程
if ($范围 == "全部") {
    $query = "select * from books where Name like ? or ID like ? or Kind like ? or Author like ? or Score like ? or Syno like ? or Site like ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssssss', $search, $search, $search, $search, $search, $search, $search);

} else if ($范围 == "书名") {
    $query = "select * from books where Name like ?";
    $stmt  = $db->prepare($query);
    $stmt->bind_param('s', $search);
} else if ($范围 == "作者") {
    $query = "select * from books where Author like ?";
    $stmt  = $db->prepare($query);
    $stmt->bind_param('s', $search);
} else if ($范围 == "简介") {
    $query = "select * from books where Syno like ?";
    $stmt  = $db->prepare($query);
    $stmt->bind_param('s', $search);
}
//被注释的是未分页的代码
//else if ($范围 == "类型") {
//    $query = "select * from books where  Kind like ?";
//    $stmt  = $db->prepare($query);
//    $stmt->bind_param('s', $search);
//}
else if($范围 == "类型"){
    //重定向到其他页面
    header("location: http://cscnh.cn/web/book/kind-result.php?范围={$范围}&search={$search}&page=1");
    exit();
}
mysqli_query($db, "set names'utf8'");
$stmt->execute();
$stmt->bind_result($ID, $Kind, $Name, $Author, $Score, $Syno, $Site);
?>
<!DOCTYPE html>
<html lang="UTF-8">
<head>
    <title>结果集</title>
</head>
<body>
<h1>查询结果：</h1>
<br>
<table width="100%" border="10" cellpadding="0" cellspacing="0" style="table-layout:fixed">
    <tr>
        <td width="50px">编号</td>
        <td width="40px">类型</td>
        <td width="150px">书名</td>
        <td width="200px">作者</td>
        <td width="40px">评分</td>
        <td width="700px">简介</td>
        <td>网址</td>
    </tr>
    <?php
    //echo "一共得到".mysqli_stmt_affected_rows($db)."行数据<br>";
    $total_num = 0;
    while ($stmt->fetch()) {
        $total_num++;
        echo "<tr>
		  <td>$ID</td>
		  <td>$Kind</td>
		  <td>$Name</td>
		  <td>$Author</td>
		  <td>$Score</td>
		  <td>$Syno</td>
		  <td><a href='$Site'>$Site</a></td>
		  </tr>";
    }
    echo "<p>一共得到" . $total_num . "行数据</p><br>";
    $stmt->free_result();
    $db->close();
    ?>
</table>
<?php
include '../footer.php';
?>
</body>
</html>
