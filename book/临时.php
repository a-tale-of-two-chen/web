<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/3/29
 * Time: 19:56
 */
//获取数据的总行数

$sql1 = "select * from books where Kind like '小说'";
//$sql = "SELECT * FROM books where Kind like "+"\"{$search}\"";
//$test = "laji";
//echo $sql1.$sql.$test;echo "垃圾";
$result_total=$db->query($sql1);
while($row = $result_total->fetch_array(MYSQLI_BOTH)){
    echo "id".$row['ID']."<br>";
}
echo count($row);exit;


