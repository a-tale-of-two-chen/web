<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/4/5
 * Time: 19:19
 */
//---------------------------------------此版本专门匹配服务器环境
header("content-type: text/html; charset=utf-8");      //设置PHP的编码UTF-8
$servername = "127.0.0.1";  //在Linux端不要填localhost
$username = "root";
$password = "51130012cyc";

// 创建连接
$db = new mysqli($servername, $username, $password);

// 检测连接
if ($db->connect_errno  ) {
    printf("连接失败,请重新尝试。",$db->connect_error );
    exit();
}
//设置数据的字符集utf-8
mysqli_query($db,"set names'utf8'");
