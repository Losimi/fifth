<?php
 include("conn.php");
//  关联数组 定义返回数数据json
$responseArr = array(
    "code" => 200,
    "data" => null
);
// 获取的所有数据
$sql = "select * from shut_down";
    //查询数据库，返回一个对象（记录集）
$result = mysqli_query($conn,$sql);
//判断返回查询的条数
if(mysqli_num_rows($result)>0){
        $moban = array();
        //result通过mysqli_fetch_assoc转化为数组
    while($row=mysqli_fetch_assoc($result)){
        $moban[] = $row;
    }
    $responseArr["data"] = $moban;
}else{
    $responseArr["code"] = 207;
}
//关闭数据库
mysqli_close($conn);
//将responseArr转换json格式发送到前端
die(json_encode($responseArr));
?>