<?php  
function getConnection(){   
    $hostname = "localhost";           //数据库服务器主机名或地址   
    $userName = "xbt_hustsvo_com";                //数据库服务器用户名   
    $password = "abcd1234";                    //数据库服务器密码   
    $database = "xbt_hustsvo_com";     //数据库名    
    global $con; 

    if($con=mysqli_connect($hostname,$userName,$password)){
        if(mysqli_select_db($con,$database)){
            if(mysqli_query($con,"set names 'utf8'"));    //设置字符集   
        }
        else{
            die(mysqli_error($con)."<br>");
        }
    }
    else{
        die(mysqli_error($con)."<br>");
    }
} 

function closeConnection(){   
    global $con;   
    if($con){   
        if(mysqli_close($con));
        else {
            die(mysqli_error($con)."<br>");
        }   
    }   
}   
?>   