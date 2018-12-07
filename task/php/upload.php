<?php
   include "conn.php";
    if ((($_FILES["file"]["type"]=="image/gif")
        ||($_FILES["file"]["type"]=="image/jpg")
        ||($_FILES["file"]["type"]=="image/png")
        ||($_FILES["file"]["type"]=="image/pjpeg"))
        &&($_FILES["file"]["size"]<10241000)){
            //错误代码：0:没有错误，1:上传文件超过选项限制的值，2上传文件的大小超过了选项指定的值
            // 3.文件值友部分被上传 4.文件没有被上传
             //判断上传信息是否错误
            if($_FILES["file"]["error"]>0){
                //输出错误
                echo "错误".$_FILES["file"]["error"]."<br>";
            }else{
                // 重新给上传的文件名，：路径+数据的返回的日期+上传文件的名字
               $filename="../upload/".$_FILES["file"]["name"];
                                   //参数1临时文件路径，2存放路径
                move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
                //移动临时文件待上传的文件存放的位置。
            } 
     } else{
         echo "文件格式不对";
     };
     //定义变量
     $url= $filename;
     $name=$_FILES["file"]["name"];
     $type=$_FILES["file"]["type"];
     $size=$_FILES["file"]["size"]; 
    //  插入数据
    $sql="insert into tupian(url,name,type,size) values('$url','$name','$type','$size')";
    $result=(mysqli_query($conn,$sql));
     if($result){
         echo "添加成功";
     }else{
         echo "失败";
     }
     //关闭数据库 
     mysqli_close($conn);
?>