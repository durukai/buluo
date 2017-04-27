<?php
 
$isload1 = $_GET['isload'];  
$buffer1 = $_GET['buffer'];  
//$my_user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);  
$huanchong_a = "/style/playdown/huanchong0.html";  
$huanchong_b = $buffer1;  
$huanchong_c = "/style/playdown/huanchong2.html?".$buffer1;  
//跳转函数  
function headerUrl($url)  
{  
    header("HTTP/1.1 302 Moved Permanently");  
    header("Location: $url");  
}  

if($isload1 == 1){
    headerUrl($huanchong_a);
}elseif($isload1 == 2){
    headerUrl($huanchong_b);  
}else{
    headerUrl($huanchong_c);  
}
   
?>  