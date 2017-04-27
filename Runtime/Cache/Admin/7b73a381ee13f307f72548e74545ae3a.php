<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>资源采集管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript">
$(document).ready(function(){
	$('#xmltip').hide();
	$('#xmllist').show();
});
var jumpurl = '<?php echo ($jumpurl); ?>';
</script>
</head>
<?php $rand=mt_rand(1,3000); ?>
<body class="body">
<div id="xmltip">资源列表载入中……</div>

<div id="xmllist" style="display:none">
<script language="JavaScript" charset="utf-8" type="text/javascript" src="http://www.jiutoushe.cn/jiutoushecj.js?<?php echo ($rand); ?>"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="http://www.jiutoushe.cn/vipcaiji/jiutoushe.php"></script>


﻿﻿<br /><center>&#80;&#111;&#119;&#101;&#114;&#101;&#100;&#32;&#98;&#121;&#32;<a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#106;&#105;&#117;&#116;&#111;&#117;&#115;&#104;&#101;&#46;&#99;&#110;" target="_blank" ><font color="#FF0000">&#20061;&#22836;&#34503;&#24433;&#38498;</font></a>,&#30001;&#39134;&#39134;&#31243;&#24207;&#20108;&#27425;&#24320;&#21457;。&#24403;&#21069;&#29256;&#26412;&#21495;&#12304;&#50;&#48;&#49;&#54;&#49;&#49;&#48;&#53;&#12305;，&#26368;&#26032;&#29256;&#26412;&#21495;&#12304; 
<script language="JavaScript" charset="utf-8" type="text/javascript" src="http://www.jiutoushe.cn/vip/banbenhao.js"></script>
&#12305;</center>
</body>
</html>