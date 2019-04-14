<!Doctype html>
<html lang="UTF-8">
<head>
    <?php
    include '../header.php';
    ?>
    <title>图书查询系统的网页实现</title>
    <style type="text/css">
        li.horizental {
            float: left;
            display: block;
            width: 150px;
            height: 30px;
            line-height: 30px;
            background: #A395E8;
            text-align: center;
            text-decoration: none;
        }

        tr {
            width: 14px;
            font-size: 18px;
            word-wrap: break-word;
        }
    </style>


</head>
<body>
<h2>欢迎使用!</h2>
<h3>首页推荐</h3>
<p>
    <small>注：UI是不存在的，仅包含查询逻辑</small>
</p>
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
    $num1 = rand(2, 16553);
    $num2 = rand(2, 16553);
    $num3 = rand(2, 16553);

    $db = new mysqli('127.0.0.1', 'root', '51130012cyc', 'book');
    if (mysqli_connect_error()) {
        echo "<h3> Mysql无连接，请稍后尝试。</h3><br>" .
            "感谢你的使用。";
        exit();
    }
    $query = "select * from books where ID = ? or ID = ? or ID = ?";
    mysqli_query($db, "set names'utf8'");
    $stmt = $db->prepare($query);
    $stmt->bind_param('ddd', $num1, $num2, $num3);
    $stmt->execute();
    $stmt->bind_result($ID, $Kind, $Name, $Author, $Score, $Syno, $Site);
    while ($stmt->fetch()) {
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
    ?>
</table>
<h3>一共有16335本书，从以下分类中确定要浏览的对象后开始搜索</h3>
<table border="0">
    <tr id="Kind">
        <td>小说</td>
        <td>随笔</td>
        <td>散文</td>
        <td>诗歌</td>
        <td>童话</td>
        <td>名著</td>
        <td>港台</td>
        <td>漫画</td>
        <td>推理</td>
        <td>绘本</td>
        <td>青春</td>
        <td>科幻</td>
        <td>言情</td>
        <td>奇幻</td>
        <td>武侠</td>
        <td>历史</td>
        <td>哲学</td>
        <td>传记</td>
        <td>设计</td>
        <td>建筑</td>
        <td>电影</td>
        <td>音乐</td>
        <td>旅行</td>
        <td>励志</td>
        <td>教育</td>
        <td>职场</td>
        <td>美食</td>
        <td>灵修</td>
        <td>健康</td>
        <td>家居</td>
        <td>管理</td>
        <td>商业</td>
        <td>金融</td>
        <td>营销</td>
        <td>理财</td>
        <td>股票</td>
        <td>科普</td>
        <td>编程</td>
        <td>算法</td>
        <td>通信</td>
        <td>回忆录</td>
        <td>经济学</td>
        <td>企业史</td>
        <td>互联网</td>
        <td>交互设计</td>
        <td>神经网络</td>
        <td>日本文学</td>
    </tr>
</table>
<h3>开始搜索：(选择类型后输入对应类型可以浏览该类型的书籍，模糊匹配需要用%...%包围被搜索字符串。)</h3>
<p>选择执行条件</p>
<form action="kind-result.php" method="get">
    <select name="范围">
        <option value="全部" selected="selected">全部</option>
        <option value="书名">书名</option>
        <option value="作者">作者</option>
        <option value="简介">简介</option>
        <option value="类型">类型</option>
    </select>
    <input id="search" name="search" type="text" maxlength="20" value="">
    <input type="submit" src="../image/my_icon.png" value="开始搜索">
</form>
<?php
include '../footer.php';
?>
</body>

</html>

