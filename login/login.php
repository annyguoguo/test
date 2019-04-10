<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php   
include_once("functions/database.php");

//收集表单提交数据   
$userName = addslashes($_POST['userName']);   
$password = addslashes($_POST['password']); 

//连接数据库   
getConnection();

//判断用户名和密码是否输入正确   
$sql = "select * from users where userName='$userName' and password='$password'";   
if($resultSet = mysqli_query($con, $sql)){
    if(mysqli_affected_rows($con)>0){   
        echo "用户名和密码输入正确！登录成功！";      
        session_start();
        $_SESSION['userName']=$userName;
     
        //立即跳转
        $url = "time.html";  
        echo('<script language="JavaScript">');
        echo("location.href='$url';");
        echo('</script>');
    } else {   
        echo "用户名和密码输入错误！登录失败！".mysqli_error($con);   
        echo("xx".$_POST['userName']."xx");
    }  
}

//断开数据库连接
closeConnection();   
?> 