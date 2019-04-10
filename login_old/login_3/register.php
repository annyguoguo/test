<?php   
header("Content-type: text/html; charset=utf-8");
include_once("functions/fileSystem.php");   
include_once("functions/database.php");   
if(empty($_POST)){   
    exit("您提交的表单数据为空！<br/>");   
}   
$userName = $_POST['userName'];
$email = $_POST['email'];
$password = $_POST['password'];   
$confirmPassword = $_POST['confirmPassword']; 
$ph1 = $_POST['ph1']; $ph2 = $_POST['ph2'];   
$people_name = $_POST['people_name']; 
$people_major = $_POST['people_major']; 
$people_phone = $_POST['people_phone']; 
$l = sizeof($people_name);
$hardwares = $_POST['hardwares']; 
$materials = $_POST['materials']; 
$remark = $_POST['remark'];
$people_name_str = null; 
$people_major_str = null; 
$people_phone_str = null; 
for ( $i=0; $i<$l; $i++) {
    $people_name_str .= $people_name[$i]."\n";
    $people_major_str .= $people_major[$i]."\n";
    $people_phone_str .= $people_phone[$i]."\n";
}

//判断输入密码与确认密码是否一致
if($password!=$confirmPassword){   
    exit("输入的密码和确认密码不相等！");   
} 

//连接数据库
getConnection(); 

//判断用户名是否占用   
$userNameSQL = "select * from users where userName='$userName'";   
if(mysqli_query($con, $userNameSQL)) {   
    if(mysqli_affected_rows($con)>0){   
        closeConnection();   
        exit("用户名已经被占用，请更换其他用户名！");   
    }   
} 
 
//插入注册信息到users表
$registerSQL = "insert into users values(null,'$userName','$email','$password','$ph1','$ph2','$people_name_str','$people_major_str','$people_phone_str','$hardwares','$materials','$remark')";   
if(mysqli_query($con, $registerSQL)) { 
    $userID = mysqli_insert_id($con);   
    echo "注册完成！<br/><br/><br/>";   
} else {
    exit(mysqli_error($con)."<br>");
}

//从数据库中提取用户注册信息   
$userSQL = "select * from users where user_id=$userID";   
if($userResult = mysqli_query($con, $userSQL)) {
    if($user = mysqli_fetch_array($userResult)){   
        $people_name_split = explode("\n", $user["people_name"]);
        $len = count($people_name_split) - 1;
        $people_name_ = null;
        for( $j=0; $j<$len; $j++ ) {
            $people_name_ .= $people_name_split[$j] . " ";
        };
        $people_phone_split = explode("\n", $user["people_phone"]);

        echo "团队名称：".$user["userName"]."<br/><br/>",   
        "电子邮箱：".$user["email"]."<br/><br/>", 
        "团队成员：".$people_name_."<br/><br/>",
        "电话号码：".$people_phone_split[0]." ".$people_phone_split[1]."<br/><br/>",
        "<button onclick=\"window.location.href='index.html'\">返回首页</button>";
    }else{   
        exit("用户信息注册失败！");   
    } 
}  

//断开数据库连接
closeConnection();   
?>   