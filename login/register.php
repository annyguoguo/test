
<style>
        *{
        font-family: Noto Serif CJK SC Light;
        }
        body{
        background-color: #212121;
        width:100%;
        }
        .s1{
        position: fixed;
        margin: auto;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: #303030;
        width: 480px;
        height:480px;
        }
        .s11{
        color: #B71C1C;
        margin-top: 48px;
        margin-left: 64px;
        height: 36px;
        }
        .box{
            margin-left: 64px;
            margin-top: 32px;
            font-size: 16px;
            height: 30px;

        }
        .text1{
            float: left;
        font-size: 16px;
        color:#FFFFFF;
        opacity: 0.54;
        }
        .text2{
            float: left;
            margin-left: 32px;
            color:#FFFFFF;
            width: 200px;
        }
        #s5{
            margin-top: 32px;
            margin-right: 32px;
            background-color: transparent;
            border-style: none;
        }
        </style>
<script>
function link(){window.location.href='index.html'}
</script>



<?php   
header("Content-type: text/html; charset=utf-8");
include_once("functions/database.php");   
if(empty($_GET)){   
    exit("您提交的表单数据为空！<br/>");   
}   
$userName = $_GET['userName'];
$email = $_GET['email'];
$password = $_GET['password'];   
$confirmPassword = $_GET['confirmPassword']; 
$ph1 = $_GET['ph1']; $ph2 = $_GET['ph2'];   
$people_name = $_GET['people_name']; 
$people_major = $_GET['people_major']; 
$people_phone = $_GET['people_phone']; 
$l = sizeof($people_name);
$hardwares = $_GET['hardwares']; 
$materials = $_GET['materials']; 
$remark = $_GET['remark'];
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
   
   echo '
      
<div class="s1">
        <div class="s11">
                <h1>输入的密码和确认密码不相等！</h1>
        </div></div>
        ';exit();
} 

//连接数据库
getConnection(); 

//判断用户名是否占用   
$userNameSQL = "select * from users where userName='$userName'";   
if(mysqli_query($con, $userNameSQL)) {   
    if(mysqli_affected_rows($con)>0){   
        closeConnection();   
        
      echo '
      
<div class="s1">
        <div class="s11">
                <h1>用户名已经被占用，请更换其他用户名！</h1>
        </div></div>';
      exit();
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

       
        
        echo '
      
<div class="s1">
        <div class="s11">
                <h1>注册完成</h1> 
        </div>
        <div class="box">
                <p class="text1">团队名称</p>
                <p class="text2">'.$user["userName"].'</p>
        </div>
        <div class="box">
                <p class="text1" id="s2">电子邮箱</p>
                <p class="text2">'.$user["email"].'</p>
        </div>
        <div class="box">
                <p class="text1" id="s3">团队成员</p>
                <p class="text2">'.$people_name_.'</p>
                </br>
        </div>
        <div class="box">
                <p class="text1" id="s4">电子号码</p>
                <p class="text2">'.$people_phone_split[0].' '.$people_phone_split[1].'</p>
                </br>
        </div>
        <div class="s11">
                <h1>报名成功后请加QQ群702904932</h1> 
        </div>
    <button id="s5" onclick="link()" ><img src="icon/返回.png" height="64" width="64"/></button>
</div>
';
        
        
        
        
        
    }else{   
        exit("用户信息注册失败！");   
    } 
}  

//断开数据库连接
closeConnection();   
?>   