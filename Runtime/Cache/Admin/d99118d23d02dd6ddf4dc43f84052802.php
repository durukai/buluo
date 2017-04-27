<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>广告管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
</head>
<body class="body">
<table border="0" cellpadding="0" cellspacing="0" class="table">
<thead><tr><th colspan="2" class="r"><span style="float:left">网站广告管理</span><span style="float:right"><a href="?s=Admin-Ads-Add">添加广告</a></span></th></tr></thead>
<form action="?s=Admin-Ads-Update" method="post" name="myform" id="myform">
  <?php if(is_array($list_ads)): $i = 0; $__LIST__ = $list_ads;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><input name="ads_id[<?php echo ($ppvod["ads_id"]); ?>]" type="hidden" value="<?php echo ($ppvod["ads_id"]); ?>">
  <tbody>
  <tr>
    <td width="250" class="l pd">广告标识：<input name="ads_name[<?php echo ($ppvod["ads_id"]); ?>]" type="text" value="<?php echo ($ppvod["ads_name"]); ?>" maxlength="25" class="w150" style="color:#003366;font-weight:bold"><br>调用代码：<input type="text" value="{:getadsurl('<?php echo ($ppvod["ads_name"]); ?>')}" maxlength="50" class="w150"></td>
    <td class="r" style="padding:5px"><span style="float:left;width:90%;"><textarea name="ads_content[<?php echo ($ppvod["ads_id"]); ?>]" style=" width:95%;height:60px"><?php echo (htmlspecialchars($ppvod["ads_content"])); ?></textarea></span> <label style="float:left; padding-top:5px; padding-left:10px"><a href="?s=Admin-Ads-View-id-<?php echo ($ppvod["ads_id"]); ?>" target="_blank">预览广告</a><br /><a href="?s=Admin-Ads-Del-id-<?php echo ($ppvod["ads_id"]); ?>" onClick="return confirm('确定删除该广告吗?')">删除广告</a></label></td>
  </tr>
  </tbody><?php endforeach; endif; else: echo "" ;endif; ?> 
  <tfoot>
    <tr>
      <td colspan="2" class="r"><input type="button" class="submit" value="批量修改" onClick="post('?s=Admin-Ads-Update');"> <input class="submit" type="reset" name="Input" value="重置" > 注：提交时如果"广告标识"为空则删除该对应的广告位</td>
    </tr>  
  </tfoot>
</form>       
</table>
﻿﻿<br /><center>&#80;&#111;&#119;&#101;&#114;&#101;&#100;&#32;&#98;&#121;&#32;<a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#106;&#105;&#117;&#116;&#111;&#117;&#115;&#104;&#101;&#46;&#99;&#110;" target="_blank" ><font color="#FF0000">&#20061;&#22836;&#34503;&#24433;&#38498;</font></a>,&#30001;&#39134;&#39134;&#31243;&#24207;&#20108;&#27425;&#24320;&#21457;</center>
</body>
</html>