<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台用户管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
<script language="javascript">
function changeid(){
	var $pidval = $('#list_pid').val();
	if($pidval == 0){
		var $tplname = '_channel';
	}else{
		var $tplname = '_list';
	}
	var $midval = $('#list_sid').val();
	if($midval == 1){
		$('#list_skin').val('pp_vod'+$tplname);
		showseo(1);
	}else if($midval == 2){
		$('#list_skin').val('pp_news'+$tplname);
		showseo(1);
	}else{
		showseo(9);
	}
};
function showseo($val){
	if($val<3){
		$('#listseo').css({display:''});
		$('#listjumpurl').css({display:"none"});	
	}else{
		$('#listseo').css({display:"none"});
		$('#listjumpurl').css({display:''});	
	}
}
$(document).ready(function(){
	$('#list_pid').change(function(){
		changeid();
	});
	$('#list_sid').change(function(){
		changeid();
	});
	$("#myform").submit(function(){
		if($feifeicms.form.empty('myform','list_name') == false){
			return false;
		}
		if($feifeicms.form.empty('myform','list_skin') == false){
			return false;
		}				
	});
	<?php if(!empty($list_id)): ?>showseo(<?php echo ($list_sid); ?>);<?php endif; ?>
});
</script>
</head>
<body class="body">
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<div class="title">
	<div class="left"><?php echo ($tpltitle); ?>栏目分类</div>
    <div class="right"><a href="?s=Admin-List-Show">返回栏目管理</a></div>
</div>
<div class="add"><?php if(($list_id)  >  "0"): ?><form action="?s=Admin-List-Update" method="post" name="myform" id="myform">
<input type="hidden" name="list_id" id="list_id" value="<?php echo ($list_id); ?>">
<?php else: ?>
<form action="?s=Admin-List-Insert" method="post" name="myform" id="myform"><?php endif; ?> 
<ul><li class="left">所属分类：</li>
    <li class="right"><select name="list_pid" id="list_pid" class="w120"><option value="0">现有分类</option><?php if(is_array($list_tree)): $i = 0; $__LIST__ = $list_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($ppvod["list_id"]); ?>" <?php if(($ppvod["list_id"])  ==  $list_pid): ?>selected<?php endif; ?>><?php echo ($ppvod["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> * 不选择将成为一级分类</li>
</ul>
<ul><li class="left">所属模型与排序：</li>
    <li class="right"><select name="list_sid" id="list_sid" class="w120"><option value="1" <?php if(($list_sid)  ==  "1"): ?>selected<?php endif; ?>>视频模型 | vod</option><option value="2" <?php if(($list_sid)  ==  "2"): ?>selected<?php endif; ?>>新闻模块 | news</option><option value="9" <?php if(($list_sid)  ==  "9"): ?>selected<?php endif; ?>>外部链接 | url</option></select>&nbsp;</li>
</ul>
<ul><li class="left">栏目排序：</li>
    <li class="right"><input type="text" name="list_oid" id="list_oid" value="<?php echo ($list_oid); ?>" maxlength="3" class="w120"><label>越小越前面</label></li>
</ul>
<ul><li class="left">栏目中文名称：</li>
    <li class="right"><input type="text" name="list_name" id="list_name" value="<?php echo ($list_name); ?>" maxlength="20" error="* 栏目名称不能为空!" class="w120"><span id="list_name_error">*</span></li>
</ul>
<ul><li class="left">栏目英文别名：</li>
     <li class="right"><input type="text" name="list_dir" id="list_dir" value="<?php echo ($list_dir); ?>" maxlength="40" class="w120"><label>留空则自动转为拼音</label></li>
</ul>
<ul><li class="left">本栏目使用的模板名：</li>
     <li class="right"><input type="text" name="list_skin" id="list_skin" value="<?php echo (($list_skin)?($list_skin):'pp_vodlist'); ?>" maxlength="40" error="* 使用模板名不能为空!" class="w120"><label><a href="javascript:" onClick="list_skin.value='pp_vodchannel';">影视大类</a> <a href="javascript:" onClick="list_skin.value='pp_vodlist';">影视小类</a> <a href="javascript:" onClick="list_skin.value='pp_newschannel';">新闻大类</a> <a href="javascript:" onClick="list_skin.value='pp_newslist';">新闻小类</a></label><span id="list_skin_error"></span></li>
</ul>
<ul><li class="left">本栏目详情页模板名：</li>
     <li class="right"><input type="text" name="list_skin_detail" id="list_skin_detail" value="<?php echo (($list_skin_detail)?($list_skin_detail):'pp_vod'); ?>" maxlength="40" class="w120"></li>
</ul>
<ul><li class="left">本栏目播放页模板名：</li>
     <li class="right"><input type="text" name="list_skin_play" id="list_skin_play" value="<?php echo (($list_skin_play)?($list_skin_play):'pp_play'); ?>" maxlength="40" class="w120"></li>
</ul>
<ul><li class="left">本栏目筛选页模板名：</li>
     <li class="right"><input type="text" name="list_skin_type" id="list_skin_type" value="<?php echo (($list_skin_type)?($list_skin_type):'pp_type'); ?>" maxlength="40" class="w120"></li>
</ul>
<div id="listseo">
<ul><li class="left">栏目SEO标题：</li>
     <li class="right"><input type="text" name="list_title" id="list_title" value="<?php echo ($list_title); ?>" maxlength="80" class="w400">&nbsp;</li>
</ul>
<ul><li class="left">栏目SEO关键词：</li>
     <li class="right"><input type="text" name="list_keywords" id="list_keywords" value="<?php echo ($list_keywords); ?>" maxlength="150" class="w400">&nbsp;</li>
</ul>
<ul><li class="left" style="line-height:40px">栏目SEO描述：</li>
     <li class="right"><textarea name="list_description" id="list_description"><?php echo ($list_description); ?></textarea></li>
</ul>
</div>
<ul id="listjumpurl" style="display:none"><li class="left">外部链接地址：</li>
     <li class="right"><input type="text" name="list_jumpurl" id="list_jumpurl" value="<?php echo (($list_jumpurl)?($list_jumpurl):'http://'); ?>" maxlength="150" class="w400"></li>
</ul>
<ul class="footer">
<input type="submit" name="submit" value="提交"> <input type="reset" name="reset" value="重置"> <?php if(($admin_id)  >  "0"): ?>注：不修改密码请留空<?php endif; ?>
</ul>
</div>
</form>
﻿﻿<br /><center>&#80;&#111;&#119;&#101;&#114;&#101;&#100;&#32;&#98;&#121;&#32;<a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#106;&#105;&#117;&#116;&#111;&#117;&#115;&#104;&#101;&#46;&#99;&#110;" target="_blank" ><font color="#FF0000">&#20061;&#22836;&#34503;&#24433;&#38498;</font></a>,&#30001;&#39134;&#39134;&#31243;&#24207;&#20108;&#27425;&#24320;&#21457;</center>
</body>
</html>