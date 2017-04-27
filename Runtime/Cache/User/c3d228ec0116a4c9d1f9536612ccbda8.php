<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台用户管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
	<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/js/jquery.js"></script>
	<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
	<script language="javascript">

		$(document).ready(function() {

			$feifeicms.show.table();

		});

	</script>
</head>
<body class="body">
	<table border="0" cellpadding="0" cellspacing="0" class="table">

		<form action="?s=User-Member-manage" method="post" name="myform" id="myform">
			<thead>
				<tr>
					<th class="r">
						<span style="float: left">会员管理</span>
					</th>
				</tr>
			</thead>
			<tr>
				<td class="tr" style="height: 40px">
					<select name="q_islock" id="q_islock">
						<option value="">状态</option>
						<option value="1" <?php if(($q_islock)  ==  "1"): ?>selected<?php endif; ?>>锁定</option>
						<option value="2" <?php if(($q_islock)  ==  "2"): ?>selected<?php endif; ?>>正常</option>
					</select> 
					&nbsp;&nbsp;		
					<select name="q_selectType" id="q_selectType">
						<option value="username" <?php if(($selectType)  ==  "username"): ?>selected<?php endif; ?>>用户名</option>
   					    <option value='userid' <?php if(($selectType)  ==  "userid"): ?>selected<?php endif; ?>>用户ID</option>
						<option value='email' <?php if(($selectType)  ==  "email"): ?>selected<?php endif; ?>>邮箱</option>
					</select> 

					<input type="text" name="wd" id="wd" maxlength="20" value="<?php echo ($wd); ?>" style="color:#666666">
					&nbsp;&nbsp;
					<input type="button" value="搜索" class="submit" onClick="post('__ROOT__/index.php?s=User-Member-manage');">						
				</td>
			</tr>
	</table>

	<table border="0" cellpadding="0" cellspacing="0" class="table">
		<thead>
			<tr class="ct">
				<th class="l" width="40"></th>
				<th class="l" width="60">用户ID</th>
				<th class="l">用户名</th>
				<th class="l" width="150">邮箱</th>
				<th class="l" width="150">注册IP</th>
				<th class="l" width="150">最后登录</th>
				<th class="r" width="90">相关操作</th>
			</tr>
		</thead>

		<form action="?s=User-Member-Delall" method="post" name="myform" id="myform">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$member): ++$i;$mod = ($i % 2 )?><tbody>
				<tr>
					<td class="l">
						<input name='ids[]' type='checkbox' value='<?php echo ($member["userid"]); ?>' class="noborder">
						<?php if($member["islock"] == 1): ?><img title="锁定" src="__PUBLIC__/user/images/lock.gif"><?php endif; ?>
					</td>
					<td class="l pd"><?php echo ($member["userid"]); ?></td>
					<td class="l pd"><?php echo (remove_xss(htmlspecialchars($member["username"]))); ?></td>
					<td class="l ct"><?php echo (remove_xss(htmlspecialchars($member["email"]))); ?></td>
					<td class="l ct"><?php echo ($member["regip"]); ?></td>
					<td class="l ct"><?php echo (date('Y-m-d H:i:s',$member["lastdate"])); ?></td>
					<td class="r ct">
						<a  href="?s=User-Member-edit-id-<?php echo ($member["userid"]); ?>" title="编辑用户资料">编辑</a>
					</td>
				</tr>
			</tbody><?php endforeach; endif; else: echo "" ;endif; ?>
			<tfoot>
				<tr>
					<td colspan="7" class="r">
						<input type="button" value="全选" class="submit" onClick="checkall('all');"> 
						<input name=""  type="button" value="反选" class="submit" onClick="checkall();">
						<input type="button" value="删除" class="submit" onClick="post('?s=User-Member-delete');"> 
						<input type="button" value="锁定" class="submit" onClick="post('?s=User-Member-lock-status-1');"> 
						<input type="button" value="解锁" class="submit" onClick="post('?s=User-Member-lock-status-0');"> 
						<input  type="button" class="submit" value="添加" onClick="window.location='?s=User-Member-Add';">
					</td>
				</tr>
				<tr>
					<td colspan="7" class="r pages"><?php echo ($pages); ?></td>
				</tr>
			</tfoot>
		</form>
	</table>
	﻿﻿<br /><center>&#80;&#111;&#119;&#101;&#114;&#101;&#100;&#32;&#98;&#121;&#32;<a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#106;&#105;&#117;&#116;&#111;&#117;&#115;&#104;&#101;&#46;&#99;&#110;" target="_blank" ><font color="#FF0000">&#20061;&#22836;&#34503;&#24433;&#38498;</font></a>,&#30001;&#39134;&#39134;&#31243;&#24207;&#20108;&#27425;&#24320;&#21457;。&#24403;&#21069;&#29256;&#26412;&#21495;&#12304;&#50;&#48;&#49;&#54;&#49;&#49;&#48;&#53;&#12305;，&#26368;&#26032;&#29256;&#26412;&#21495;&#12304; 
<script language="JavaScript" charset="utf-8" type="text/javascript" src="http://www.jiutoushe.cn/vip/banbenhao.js"></script>
&#12305;</center>
</body>
</html>