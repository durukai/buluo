<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>添加幻灯广告</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
<script language="javascript">
$(document).ready(function(){
	$("#myform").submit(function(){
		if($feifeicms.form.empty('myform','slide_name') == false){
			return false;
		}
		if($feifeicms.form.empty('myform','slide_url') == false){
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
	<div class="left"><?php echo ($tpltitle); ?>幻灯贴片</div>
    <div class="right"><a href="?s=Admin-Slide-Show">返回幻灯管理</a></div>
</div>
<div class="add">
	<?php if(($slide_id)  >  "0"): ?><form action="?s=Admin-Slide-Update" method="post" name="myform" id="myform">
    <input type="hidden" name="slide_id" value="<?php echo ($slide_id); ?>">
    <?php else: ?>
    <form action="?s=Admin-Slide-Insert" method="post" name="myform" id="myform"><?php endif; ?> 
    <ul><li class="left">幻灯名称：</li>
    	<li class="right"><input type="text" name="slide_name" id="slide_name" value="<?php echo ($slide_name); ?>" class="w300" error="* 请填写幻灯片名称!"><span id="slide_name_error">*</span></li>
    </ul>
    <ul><li class="left">链接地址：</li>
    	<li class="right"><input type="text" name="slide_url" id="slide_url" value="<?php echo ($slide_url); ?>" class="w300" error="* 请填写幻灯片链接地址!"><span id="slide_url_error">*</span></li>
    </ul>
     <ul><li class="left">LOGO小图：</li>
    	<li class="right"><input type="text" name="slide_logo" id="slide_logo" maxlength="255" value="<?php echo ($slide_logo); ?>" class="w300" onMouseOver="if(this.value)showpic(event, this.value,'<?php echo C("upload_path");?>/');" onMouseOut="hiddenpic();">&nbsp;</li>
        <li class="left" style="width:94px">上传图片：</li>
        <li class="right"><iframe src="?s=Admin-Upload-Show-sid-slide-fileback-slide_logo" scrolling="no" topmargin="0" width="270" height="26" marginwidth="0" marginheight="0" frameborder="0" align="left" style="margin-top:4px"></iframe></li>
    </ul>   
    <ul><li class="left">幻灯图片：</li>
    	<li class="right"><input type="text" name="slide_pic" id="slide_pic" maxlength="255" value="<?php echo ($slide_pic); ?>" class="w300" onMouseOver="if(this.value)showpic(event, this.value,'<?php echo C("upload_path");?>/');" onMouseOut="hiddenpic();">&nbsp;</li>
        <li class="left" style="width:94px">上传图片：</li>
        <li class="right"><iframe src="?s=Admin-Upload-Show-sid-slide-fileback-slide_pic" scrolling="no" topmargin="0" width="270" height="26" marginwidth="0" marginheight="0" frameborder="0" align="left" style="margin-top:4px"></iframe></li>
    </ul>
    <ul><li class="left">幻灯排序：</li>
    	<li class="right"><input name="slide_oid" type="text" value="<?php echo ($slide_oid); ?>" maxlength="3" title="越小越前面" class="w50"> <span id="slide_oid">*</span></li>
    </ul>
    <ul><li class="left">幻灯分类：</li>
    	<li class="right"><input name="slide_cid" type="text" value="<?php echo (($slide_cid)?($slide_cid):'1'); ?>" maxlength="3" class="w50"> 自定义幻灯分类ID，便于前台栏目判断指定的幻灯</li>
    </ul>       
    <ul><li class="left">幻灯状态：</li>
    	<li><select name="slide_status"><option value="1">显示</option><option value="0" <?php if(($slide_status)  ==  "0"): ?>selected<?php endif; ?>>隐藏</option></select>&nbsp;</li>
    </ul>   
    <ul><li class="left">幻灯简介：</li>
    	<li class="right" style="height:140px;"><textarea name="slide_content" style="width:650px;height:120px" title="支持html语法"><?php echo ($slide_content); ?></textarea></li>  
    </ul>     
    <ul class="footer" style="border-top:1px solid #cad9ea"><input type="submit" name="submit" value="提交"> <input type="reset" name="reset" value="重置"> <?php if(($admin_id)  >  "0"): ?>注：不修改密码请留空<?php endif; ?></ul>
    </form>
</div>
﻿﻿<br /><center>&#80;&#111;&#119;&#101;&#114;&#101;&#100;&#32;&#98;&#121;&#32;<a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#106;&#105;&#117;&#116;&#111;&#117;&#115;&#104;&#101;&#46;&#99;&#110;" target="_blank" ><font color="#FF0000">&#20061;&#22836;&#34503;&#24433;&#38498;</font></a>,&#30001;&#39134;&#39134;&#31243;&#24207;&#20108;&#27425;&#24320;&#21457;</center>
</body>
</html>