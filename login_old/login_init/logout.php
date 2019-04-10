<?php

session_start();
unset($_SESSION['userName']);



 
//跳转
echo('<script language="JavaScript">');
echo("location.href='index.html';");
echo('</script>');
closeConnection();   
?> 