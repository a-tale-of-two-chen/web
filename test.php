<?php
/**
 * Created by PhpStorm.
 * User: 26309
 * Date: 2019/3/17
 * Time: 16:43
 */
if(!function_exists('mysqli_init')&&!extension_loaded('mysqli')){
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!<br>';
}
?>
---------------------
作者：jlu16
来源：CSDN
原文：https://blog.csdn.net/jlu16/article/details/79504784
版权声明：本文为博主原创文章，转载请附上博文链接！