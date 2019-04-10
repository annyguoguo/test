<?php
include_once("functions/database.php");
//注销
session_start();
if($_SESSION['userName']){
    unset($_SESSION['userName']);
}

//跳转
echo('<script language="JavaScript">');
echo("location.href='index.html';");
echo('</script>');
closeConnection();   
?> 