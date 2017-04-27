<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>添加广告</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
<script language="javascript">
$(document).ready(function(){
	$("#myform").submit(function(){
		if($feifeicms.form.empty('myform','ads_name') == false){
			return false;
		}
	});
});
</script>
</head>
<body class="body">
<!--图片预览框-->
<div id="showpic" class="showpic" style="display:none;"><img name="showpic_img" id="showpic_img" width="120" height="160"></div>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<div class="title">
	<div class="left">添加网站广告</div>
    <div class="right"><a href="?s=Admin-Ads-Show">网站广告管理</a></div>
</div>
<div class="add">
    <form action="?s=Admin-Ads-Insert" method="post" name="myform" id="myform">
    <ul><li class="left">广告标识：</li>
    	<li class="right"><input type="text" name="ads_name" id="ads_name" value="<?php echo ($ads_name); ?>" class="w150" error="* 请填写广告标识!"><span id="ads_name_error">*</span></li>
    </ul>   
    <ul><li class="left">广告代码：</li>
    	<li class="right" style="height:135px;text-align:left"><textarea name="ads_content" style="width:650px;height:120px"><?php echo ($ads_content); ?></textarea></li>  
    </ul>  
    <ul class="footer" style="border-top:1px solid #cad9ea"><input type="submit" name="submit" value="提交"> <input type="reset" name="reset" value="重置"></ul>
    </form>
</div>
﻿﻿<br /><center>&#80;&#111;&#119;&#101;&#114;&#101;&#100;&#32;&#98;&#121;&#32;<a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#106;&#105;&#117;&#116;&#111;&#117;&#115;&#104;&#101;&#46;&#99;&#110;" target="_blank" ><font color="#FF0000">&#20061;&#22836;&#34503;&#24433;&#38498;</font></a>,&#30001;&#39134;&#39134;&#31243;&#24207;&#20108;&#27425;&#24320;&#21457;</center>
</body>
</html>