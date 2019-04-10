<?php
header("Content-type:text/html; charset=utf-8");
if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=htmlspecialchars($_POST['name']);
        $id=htmlspecialchars($_POST['id']);
        $phone=htmlspecialchars($_POST['phone']);
        $institute=htmlspecialchars($_POST['institute']);
        $birthday=htmlspecialchars($_POST['birthday']);
        $location=htmlspecialchars($_POST['location']);
        $email=htmlspecialchars($_POST['email']);
        $departments=$_POST['department']; 
        $other=htmlspecialchars($_POST['other']);
        $l=sizeof($departments);
        $departments_str="";
        for ( $i=0; $i<$l; $i++) {
            $departments_str.=$departments[$i]." ";
        }
}
if($con=mysqli_connect("localhost","xbt_hustsvo_com","abcd1234")){
    echo "连接数据库成功<br>";
    if(mysqli_select_db($con,"xbt_hustsvo_com")){
        echo "选择数据库成功<br>";
        if(mysqli_query($con,"INSERT INTO tb1
        VALUES('$name','$id','$phone','$institute','$departments_str')")){
            echo "插入记录成功<br>";
        }
        else{
            echo "插入记录失败".mysqli_error($con)."<br>";
        }
    }
    else{
        echo "选择数据库失败".mysqli_error($con)."<br>";
    }
}
else{
    echo "连接数据库失败：".mysqli_error($con)."<br>";
}
mysqli_close($con);
?>