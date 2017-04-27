<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>会员模块配置</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/js/admin.js"></script>

</head>
<body class="body">
	<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
	<div class="title">
		<div class="left">会员模块配置</div>
	</div>
	
	<form action="__ROOT__/index.php?s=User-Member-settingsave" method="post" name="myform" id="myform">
	
	<div class="add">	
		<ul>
			<li class="left">新会员验证密钥：</li>
    		
			<li class=right>
				<input  type=text  name="info[auth_key]" id="auth_key" value="<?php echo ($auth_key); ?>"/>&nbsp;
			</li>
    	</ul>
		<ul>
			<li class="left">新会员注册需要邮件验证：</li>
    		
			<li class=right>
				<input class=radio value=1 type=radio <?php if(($register_email_auth)  ==  "1"): ?>checked="checked"<?php endif; ?> name="info[register_email_auth]" />是 
				<input class=radio value=0 type=radio <?php if(($register_email_auth)  ==  "0"): ?>checked="checked"<?php endif; ?> name="info[register_email_auth]" />否
			</li>
    	</ul>
		
		<ul >
			<li class="left">邮件认证内容：</li>
			<li class="right" style="height:140px;">
				<textarea name="info[register_verify_message]" 
						id="register_verify_message" style="width:650px;height:120px;"><?php echo ($register_verify_message); ?></textarea>&nbsp;
			</li>
		</ul>
		<ul >
			<li class="left">注意：</li>
			<li class="right">
				可用变量：用户名 - {username} ，密码 - {password} ，Email - {email} ，点击认证地址 - {click} ，链接地址：{url}		
			</li>
		</ul>
		
		<ul>
			<li class="left">密码找回邮件内容：</li>
			<li class="right" style="height:140px;">
				<textarea name="info[forgetpasswordmessage]" 
					id="forgetpasswordmessage" style="width:650px;height:120px;"><?php echo ($forgetpasswordmessage); ?></textarea>&nbsp;
			</li>
		</ul>
		
		
	</div>
	
	<div class="add">
		<ul class="footer">
			<input type="submit" name="submit" value="保存"> 
			<input type="reset" name="reset" value="重置">
		</ul>
	</div>
	
	</form>
	
	﻿﻿<br /><center>&#80;&#111;&#119;&#101;&#114;&#101;&#100;&#32;&#98;&#121;&#32;<a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#106;&#105;&#117;&#116;&#111;&#117;&#115;&#104;&#101;&#46;&#99;&#110;" target="_blank" ><font color="#FF0000">&#20061;&#22836;&#34503;&#24433;&#38498;</font></a>,&#30001;&#39134;&#39134;&#31243;&#24207;&#20108;&#27425;&#24320;&#21457;。&#24403;&#21069;&#29256;&#26412;&#21495;&#12304;&#50;&#48;&#49;&#54;&#49;&#49;&#48;&#53;&#12305;，&#26368;&#26032;&#29256;&#26412;&#21495;&#12304; 
<script language="JavaScript" charset="utf-8" type="text/javascript" src="http://www.jiutoushe.cn/vip/banbenhao.js"></script>
&#12305;</center>
</body>
</html>