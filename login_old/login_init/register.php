
<?php   
header("Content-type: text/html; charset=utf-8");
include_once("functions/fileSystem.php");   
include_once("functions/database.php");   
if(empty($_POST)){   
     exit("您提交的表单数据超过post_max_size的配置！<br/>");   
}   
$password = $_POST['password'];   
$confirmPassword = $_POST['confirmPassword'];   
if($password!=$confirmPassword){   
     exit("输入的密码和确认密码不相等！");   
}   
$userName = $_POST['userName'];   
//$domain = $_POST['domain'];   
$userName = $userName;   
$people = $_POST['people']; 
$wtneed = $_POST['wtneed']; 
$ph1 = $_POST['ph1']; $ph2 = $_POST['ph2']; 

//判断用户名是否占用   
$userNameSQL = "select * from users where userName='$userName'";   
getConnection();   
$resultSet = mysql_query($userNameSQL);   
if(mysql_num_rows($resultSet)>0){   
     closeConnection();   
     exit("用户名已经被占用，请更换其他用户名！");   
}   
//收集用户其他信息   
 

$remark = $_POST['remark'];   
//$myPictureName = $_FILES['myPicture']['name'];   
//只有“文件上传成功”或“没有上传附件”时，才进行注册   
$registerSQL = "insert into users values(null,'$userName','$password','$ph1', '$ph2','$people','$wtneed','$remark')";   
//$message = upload($_FILES['myPicture'],"uploads");   
//if($message=="文件上传成功！"||$message=="没有选择上传附件！"){   
     mysql_query($registerSQL);   
     $userID = mysql_insert_id();   
     echo "用户信息成功注册！<br/><br/><br/>";   
//}else{   
//     exit($message);   
//}   
//从数据库中提取用户注册信息   
$userSQL = "select * from users where user_id=$userID";   
$userResult = mysql_query($userSQL);   
if($user = mysql_fetch_array($userResult)){   
     echo "您注册的用户名为：".$user["userName"]."<br/><br/>";   
     echo "您填写的登录密码为：".$user["password"]."<br/><br/>";  
     echo "性别：".$user["ph1"]."<br/><br/>";  
     echo "爱好：".$user["ph2"]."<br/><br/>";  
     echo "爱好：".$user["people"]."<br/><br/>";  
     echo "爱好：".$user["wtneed"]."<br/><br/>";  
     //$pictureAdrees="uploads/".$myPictureName;  
     //echo "上传的照片：";  
     //echo '<img src="'.$pictureAdrees.'"  width="200px">';  
     echo "<br/><br/>";  
     echo "备注信息：".$user['remark'];  
}else{   
     exit("用户信息注册失败！");   
}   
closeConnection();   
?>   