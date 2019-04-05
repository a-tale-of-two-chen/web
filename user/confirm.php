<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/4/5
 * Time: 18:13
 */
$flag = $_POST['flag'];
$name = $_POST['name'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
@$mail = $_POST['mail'];        //一个页面处理三个请求......
$number = "";


//开启数据库连接,选择数据库
include '../mysql.php';
$db->select_database('user');

if(isset($_POST['mail'])){
    $query = "insert into users values (?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('dsss',$number,$name,$password,$mail);
    $stmt->execute();

    if($stmt->affected_rows>0){
        echo "<p>注册成功</p>";
        header();
    }
}


