<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>幻灯管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
<script language="javascript">
$(document).ready(function(){
	$feifeicms.show.table();		
});
</script>
</head>
<body class="body">
<table border="0" cellpadding="0" cellspacing="0" class="table">
<thead><tr><th colspan="3" class="r"><span style="float:left">幻灯贴片管理</span><span style="float:right"><a href="?s=Admin-Slide-Add">添加幻灯贴片</a></span></th></tr></thead>
  <?php if(is_array($list_slide)): $i = 0; $__LIST__ = $list_slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><tbody> 
  <tr>
    <td class="l ct" width="180" style="padding:5px 0px"><a href="<?php echo ($ppvod["slide_pic"]); ?>" target="_blank"><img src="<?php echo ($ppvod["slide_pic"]); ?>" width="150px" height="75px" alt="查看原图" style="border:1px solid #CCCCCC;padding:1px;"></a></td>
    <td class="l pd" style="line-height:18px;color:#333"><a href="<?php echo ($ppvod["slide_url"]); ?>" target="_blank"><font style="font-size:14px;font-weight:bold;"><?php echo ($ppvod["slide_name"]); ?></font></a><br><?php echo ($ppvod["slide_content"]); ?></td>
    <td class="r ct" width="100"><a href="?s=Admin-Slide-Add-id-<?php echo ($ppvod["slide_id"]); ?>">修改</a> <a href="?s=Admin-Slide-Del-id-<?php echo ($ppvod["slide_id"]); ?>" onClick="return confirm('确定删除该幻灯片吗?')" title="点击删除幻灯片">删除</a>  <?php if(($ppvod['slide_status'])  ==  "1"): ?><a href="?s=Admin-Slide-Status-id-<?php echo ($ppvod["slide_id"]); ?>-sid-0" title="点击隐藏幻灯">隐藏</a><?php else: ?><a href="?s=Admin-Slide-Status-id-<?php echo ($ppvod["slide_id"]); ?>-sid-1" title="点击显示幻灯片"><font color="red">显示</font></a><?php endif; ?></td>
  </tr>
  </tbody><?php endforeach; endif; else: echo "" ;endif; ?>        
</table>
﻿﻿<br /><center>&#80;&#111;&#119;&#101;&#114;&#101;&#100;&#32;&#98;&#121;&#32;<a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#106;&#105;&#117;&#116;&#111;&#117;&#115;&#104;&#101;&#46;&#99;&#110;" target="_blank" ><font color="#FF0000">&#20061;&#22836;&#34503;&#24433;&#38498;</font></a>,&#30001;&#39134;&#39134;&#31243;&#24207;&#20108;&#27425;&#24320;&#21457;</center>
</body>
</html>