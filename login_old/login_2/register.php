<?php   
header("Content-type: text/html; charset=utf-8");
include_once("functions/fileSystem.php");   
include_once("functions/database.php");   
if(empty($_POST)){   
    exit("您提交的表单数据为空！<br/>");   
}   
$password = $_POST['password'];   
$confirmPassword = $_POST['confirmPassword'];   
$userName = $_POST['userName'];   
$people_name = $_POST['people_name']; 
$people_major = $_POST['people_major']; 
$people_phone = $_POST['people_phone']; 
$l = sizeof($people_name);
$wtneed = $_POST['wtneed']; 
$ph1 = $_POST['ph1']; $ph2 = $_POST['ph2']; 
$remark = $_POST['remark'];
$people = null; 
for ( $i=0; $i<$l; $i++) {
    $people .= "姓名：".$people_name[$i]." 专业班级：".$people_major[$i]." 电话号码：".$people_phone[$i]."\n";
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
$registerSQL = "insert into users values(null,'$userName','$password','$ph1', '$ph2','$people','$wtneed','$remark')";   
if(mysqli_query($con, $registerSQL)) { 
    $userID = mysqli_insert_id($con);   
    echo "用户信息成功注册！<br/><br/><br/>";   
} else {
    exit(mysqli_error($con)."<br>");
}

//从数据库中提取用户注册信息   
$userSQL = "select * from users where user_id=$userID";   
if($userResult = mysqli_query($con, $userSQL)) {
    if($user = mysqli_fetch_array($userResult)){   
        $peopleSplit = explode("\n", $user["people"]);
        $len = count($peopleSplit) - 1;
        $people_ = null;
        for( $j=0; $j<$len; $j++ ) {
            $people_ .= $peopleSplit[$j] . "<br/>";
        };
        echo "您注册的用户名为：".$user["userName"]."<br/><br/>",   
        "您填写的登录密码为：".$user["password"]."<br/><br/>",  
        "手机号码1：".$user["ph1"]."<br/><br/>",  
        "手机号码2：".$user["ph2"]."<br/><br/>",
        "参赛人员："."<br/>".$people_."<br/><br/>",   
        "需要主办方提供的硬件设施：".$user['wtneed']."<br/><br/>",  
        "参赛经历及奖项：".$user['remark']."<br/><br/>", 
        "<button onclick=\"window.location.href='index.html'\">返回首页</button>";
    }else{   
        exit("用户信息注册失败！");   
    } 
}  

//断开数据库连接
closeConnection();   
?>   