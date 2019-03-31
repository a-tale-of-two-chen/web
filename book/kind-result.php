<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/3/28
 * Time: 22:34
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
//limit要求的参数
$length  = 15;
$pagenum = @$_GET['page'] ? $_GET['page'] : 1;
//获取数据的总行数
$query = "select * from books where Kind like ?";
$stmt  = $db->prepare($query);
$stmt->bind_param('s', $search);
mysqli_query($db, "set names'utf8'");
$stmt->execute();
$stmt->bind_result($ID, $Kind, $Name, $Author, $Score, $Syno, $Site);
$datatotal = 0;
while ($stmt->fetch()) {
    $datatotal++;
}


$stmt->free_result();
//-----------------------------------------------------------------------------------
//计算所需页数的总数
$pagetotal = $datatotal / $length;
//限制最大页数
if ($pagenum >= $pagetotal) {
    $pagenum = $pagetotal;
}
$startnum = ($pagenum - 1) * $length;
//得到数据集
$query = "select * from books where Kind like ?";
$stmt  = $db->prepare($query);
$stmt->bind_param('s', $search);
mysqli_query($db, "set names'utf8'");
$stmt->execute();
$stmt->bind_result($ID, $Kind, $Name, $Author, $Score, $Syno, $Site);
?>
<!DOCTYPE html>
<html lang="UTF-8">
<head>
    <?php
    include '../header.php';
    ?>
    <title>结果集</title>
</head>
<body>
<h1>查询结果：</h1>
<h2>一共
    <?php
    echo $datatotal;
    ?>
    行数据</h2>
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
    //echo "一共得到".$stmt->num_rows."行数据<br>";
    $total_num = 0;
    while ($stmt->fetch()) {
        if ($total_num >= $startnum && $total_num <= $startnum + $length) {
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
        $total_num++;
    }
    echo "<p>本页一共" . $length . "行数据</p><br>";
    $stmt->free_result();
    $db->close();
    ?>
</table>
<?php
//计算上一页和下一页
$prevpage = $pagenum - 1;
$nextpage = $pagenum + 1;
echo "<h2><a href='kind-result.php?search={$search}&范围={$范围}&page={$prevpage}'>上一页</a>
    <a href='kind-result.php?search={$search}&范围={$范围}&page={$nextpage}'>下一页</a></h2>";
?>
<?php
include '../footer.php';
?>
</body>
</html>
