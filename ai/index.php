<?php
header("Content-type:text/html; charset=utf-8");
if($_SERVER["REQUEST_METHOD"]=="GET"){
        $l1=$_GET["l1"];
        $l2=$_GET["l2"];
        $l3=$_GET["l3"];
        
        
        };
        echo ($l1/$l2."</br>".$l2/$l3."</br>".$l3/$l1);







?>
<form action="index.php" method="GET" >
    <div class="ans" id="ans2">

        <input type="txt" name="l1" required="required" oninvalid="setCustomValidity('名字呢！');" oninput="setCustomValidity('');" >
        <input type="txt" name="l2" required="required" oninvalid="setCustomValidity('名字呢！');" oninput="setCustomValidity('');" >
        <input type="txt" name="l3" required="required" oninvalid="setCustomValidity('名字呢！');" oninput="setCustomValidity('');" >

    </div>
    <input type="submit" name="submit" required="required" id="u91" style="text-align: center;" >
    </form>