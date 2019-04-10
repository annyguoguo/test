<?php
header("Content-type: text/html; charset=utf-8");
include_once("functions/fileSystem.php");   
include_once("functions/database.php");   

session_start();
getConnection();  
if(empty($_SESSION['userName'])){   
    echo("请先登录后再上传");
} else {   
    $userName=$_SESSION['userName'];   
    //只有“文件上传成功”或“没有上传附件”时，才进行注册   
    if($message = upload($_FILES['myppt'],"uploads","创客马拉松-".$_FILES['myppt']["name"],$userName)){
        echo($message);
    } else {
        echo($message);
    }
}   

closeConnection();   
?>  

