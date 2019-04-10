<style>
    body{
        background: #303030;
        margin:0; padding:0;
        color: white;
      
         
		 
		 font-family:"Mincrosoft YaHei Light";
		 }

    }

    .tz{
        width:336px;
        word-wrap:break-word;word-break:break-all;
        margin:0; padding:0;
    }
    .time{font-size:16px;
        width: 68px;
    }
    .bord{height:100%;
        background: red;
        width: 3px;
        position: absolute;
        left: 72px;
        top: 0px;
        
    }
    .word{
        font-size:12px;
        padding-left: 71px;
        margin-bottom: 24px;
        margin-top: -16px;
    }
</style>

<?php




$con=mysqli_connect('localhost','hustsvo','abcd1234','hustsvo');

    
    $sql="select * from hdnews where id!='' ";
    $res=mysqli_query($con,$sql);
    $num2='';
   
   
   

echo '<div class="tz">';

echo'<div class="bord">';
echo '</div>';

echo '<marquee direction="down" height="300px" behavior="scroll" scrollamount="2" scrolldelay="1" loop="-1"  hspace="10" vspace="10">';
   
   
   
   
   
   
   
   
   
    while($row=mysqli_fetch_array($res,MYSQLI_BOTH)){
        
        echo'<div class="news">';
        
        echo'<div class="time">';
        echo $row['time'];
        echo '</div>';
        echo'<div class="word">';
        echo $row['word'];
        echo '</div>';
        
        
        $num2=$row['num'];  
   






















 }
    mysqli_free_result($res);
    mysqli_close($con);       





echo '</div>';

echo '</marquee>';
echo '</div>';
?>