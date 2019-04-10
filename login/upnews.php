<?php
header("Content-type:text/html; charset=utf-8");
if($_SERVER["REQUEST_METHOD"]=="POST"){
        $time=htmlspecialchars($_POST['time']);
        $word=htmlspecialchars($_POST['word']);
        
}
if($con=mysqli_connect("localhost","hustsvo","abcd1234")){
    echo "连接数据库成功<br>";
    if(mysqli_select_db($con,"hustsvo")){
        echo "选择数据库成功<br>";
        if(mysqli_query($con,"INSERT INTO hdnews
        VALUES(null,'$time','$word')")){
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



<form action="upnews.php" method="post" target="iframe">
            <p>时间:</p>
            <input type="txt" name="time" >
            <br>
            <p>内容:</p>
            <textarea name="word"  cols="100" rows="30" ></textarea>
            <br>
           
            <br>
            <input type="submit" name="submit" required="required">
         </form>