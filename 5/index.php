<?php
$url = "https://yqall02.baidupcs.com/file/debd7e8800c5481ee7ab55962e0dcff8?fid=212064383-250528-562787395842429&time=1520681585&rt=sh&sign=FDTAERV-DCb740ccc5511e5e8fedcff06b081203-ZO%2FI0UFGajp6nCDmY1WFodNbw4c%3D&expires=8h&chkv=1&chkbd=0&chkpc=&dp-logid=1596006044930991713&dp-callid=0&r=973113430";
$response = get_headers($url);
echo "<pre>";
print_r($response);
$response = get_headers($url,1);
echo '<pre>';
print_r($response);

?>