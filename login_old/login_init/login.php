<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php   
include_once("functions/database.php");   
//收集表单提交数据   
$userName = addslashes($_POST['userName']);   
$password = addslashes($_POST['password']);   
//连接数据库服务器   
getConnection();   
//判断用户名和密码是否输入正确   
$sql = "select * from users where userName='$userName' and password='$password'";   
$resultSet = mysql_query($sql);   
if(mysql_num_rows($resultSet)>0){   
     echo "用户名和密码输入正确！登录成功！";   
     
   
     
     
     session_start();
     $_SESSION['userName']=$userName;
     
$url = "upload.html";  
 
//跳转
echo('<script language="JavaScript">');
echo("location.href='$url';");
echo('</script>');
}else{   
     echo "用户名和密码输入错误！登录失败！";   
}   
closeConnection();   
?> 