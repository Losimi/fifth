<?php
//连接数据库
//1.登录连接数据库
$conn=mysqli_connect("localhost","root","");
if($conn){
    // echo "连接成功";
}else{
    // die("连接失败".mysqli_connect_error());
}
//2、选择要操作的数据库
mysqli_select_db($conn,"fifth");
//设置读取数据库的编码，不然有可能乱码
mysqli_query($conn,"set names utf8");
?>