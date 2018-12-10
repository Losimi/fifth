<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"fifth");
mysqli_query($conn,"set names utf8");

$responseArr = array(
    "code" => 200,
    "data" => null,
    "status" => 1,
);
$action = $_REQUEST['action'];
switch($action){
    case 'unclose':$sql = "select * from activity where state != '完成' and state != '' ";
    break;
    case 'today_info':$sql = "select * from clues";
    break;
    case 'price' :$sql = "select * from phase";
    break;
    case 'closed' : $sql = "select * from shut_down ";
    break;
}
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $list = array();
    while($row = mysqli_fetch_assoc($result)){
        $list[] = $row;
    };
    $responseArr['data'] = $list;
}else{
    $responseArr["code"] = 207;
    $responseArr['status'] = 0;
}
echo(json_encode($responseArr));
mysqli_close($conn);
?>