<?php
 
/**
 * @author * @copyright http://www.ffcms.cn/
 * @输出USER-AGENTS print_r($_SERVER['HTTP_USER_AGENT']);
 */

$playname = $_GET['playname'];  
$u = $_GET['u'];  
$v = $_GET['v'];//USER_AGENT转换小写  
$my_user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);  
   
//定义播放器URL  
$play_win_qvod = "/style/playdown/qvodwin.html";  
$play_android_qvod = "/style/playdown/qvodandroid.html";  
$play_ios_qvod = "/style/playdown/qvodios.html";  
$play_wp_qvod = "http://windowsphone.com/s?appId=ff5f6465-b81e-40dc-9692-25f3c73c5f20";
$play_xigua="/style/playdown/xigua.html";
$play_xfplay="/style/playdown/xfplay.html";
$play_jjhd="/style/playdown/jjhd.html";
$play_jjvod="/style/playdown/jjvod.html";
$play_ffhd="/style/playdown/ffhd.html";
//跳转函数  
function headerUrl($url)  
{  
    header("HTTP/1.1 302 Moved Permanently");  
    header("Location: $url");  
}  
   
//Windows平台  
if(strpos($my_user_agent,"windows") == true)  
{  
    if($playname == "xigua"){
        headerUrl($play_xigua);
    }elseif($playname == "xfplay"){
        headerUrl($play_xfplay);  
    }elseif($playname == "jjvod"){
        headerUrl($play_jjvod);  
    }elseif($playname == "ffhd"){
        headerUrl($play_ffhd);  
    }
    else{ 
        headerUrl($play_win_qvod); 
    }
}  
   
//android平台 
if(strpos($my_user_agent,"android") == true)  
{  
    if($playname == "qvod")  
    {  
        //android快播  
        headerUrl($play_android_qvod);  
    }  
}  
   
//iPhone平台 包含iPod  
if(strpos($my_user_agent,"iphone") == true || strpos($my_user_agent,"ipod") == true)  
{  
    if($playname == "qvod")  
    {  
        //iPhone快播  
        headerUrl($play_ios_qvod);  
    }  
}  
if(strpos($my_user_agent,"Windows Phone") == true)  
{  
    if($playname == "qvod")  
    {  
        //wp快播  
        headerUrl($play_wp_qvod);  
    }  
}    
?>  