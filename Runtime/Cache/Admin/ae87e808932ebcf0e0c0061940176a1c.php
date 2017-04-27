<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Left</title>
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-left.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="__PUBLIC__/jquery/jquery-1.7.2.min.js"></script>
<script language="javascript">
$(document).ready(function(){
	$("a").click(function(){
		$("a").removeClass("on"); 
		$(this).addClass("on");
		$(this).blur();
	});
});
</script>
<base target="right">
</head>
<body class="body">
<table width="140" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td valign="top" class="left">
<div id="menu0" style="display:block">
<a href="?s=Admin-Admin-Config" class="on">网站信息配置</a>
<a href="?s=Admin-Index-Right">系统运行环境</a>
<a href="?s=Admin-Nav-Show">快捷菜单设置</a>
<?php if(is_array($array_nav)): $i = 0; $__LIST__ = $array_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($ppvod); ?>"><?php echo ($key); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div id="menu1" style="display:none">
<a href="?s=Admin-List-Show">网站栏目管理</a>
<a href="?s=Admin-List-Add">添加网站栏目</a>
<a href="?s=Admin-Vod-Show" class="on">视频数据管理</a>
<a href="?s=Admin-Vod-Add">添加视频数据</a>
<a href="?s=Admin-News-Show">新闻资讯管理</a>
<a href="?s=Admin-News-Add">添加新闻资讯</a>
<a href="?s=Admin-Special-Show">网站专题管理</a>
<a href="?s=Admin-Special-Add">添加网站专题</a>
<a href="?s=Admin-Tag-Show">标签TAG管理</a>
<a href="?s=Admin-Cat-Add">添加类型</a>
<a href="?s=Admin-Cat-Show">管理类型</a>
<a href="?s=Plus-Check-VideoCheck-check_sub-ok">重名检查</a>
<a href="?s=Admin-Vod-Show-continu-1" class="line">连载中的影片</a>
<a href="?s=Admin-Vod-Show-status-2" class="line">未审核的影片</a>
<a href="?s=Admin-Vod-Show-status-3" class="line">待复查的影片</a>
<a href="?s=Admin-Vod-Show-isfilm-1" class="line">已上映的影片</a>
<a href="?s=Admin-Vod-Show-isfilm-2" class="line">未上映的影片</a>
<a href="?s=Admin-Vod-Show-isfilm-3" class="line">热映中的影片</a>
<a href="?s=Admin-Vod-Show-url-1" class="line">无播放地址影片</a>

</div>
<div id="menu2" style="display:none">
<a href="?s=Admin-Xml-Show" class="on">一键采集视频</a>
<a href="?s=plus-dswin-show">定时自动采集</a>
<a href="?s=Admin-Collect-Show">视频采集规则</a>
<a href="?s=Admin-Collect-Add">添加采集规则</a>
<a href="?s=Admin-Collect-Export">导出采集规则</a>
<a href="?s=Admin-Collect-Import">导入采集规则</a>
<a href="?s=Admin-Cj-Change">栏目转换规则</a> 
</div>
<div id="menu3" style="display:none">
<a href="?s=Admin-Cache-Show" class="on">系统缓存管理</a>
<a href="?s=Admin-Slide-Show">幻灯贴片管理</a>
<a href="?s=Admin-Slide-Add">添加幻灯贴片</a>
<a href="?s=Admin-Ads-Show">网站广告管理</a>
<a href="?s=Admin-Ads-Add">添加网站广告</a>
<a href="?s=Admin-Link-Show">友情链接管理</a>
<a href="?s=Admin-Link-Add">添加友情链接</a> 
<a href="?s=Admin-Pic-Show">无效图片清理</a>
<a href="?s=Admin-Pic-Down" onClick="return confirm('消耗资源较多，请勿在高峰期执行该操作!')">下载远程图片</a>
</div>
<div id="menu4" style="display:none">
<a href="?s=Admin-Tpl-Show" class="on">模板在线管理</a>
</div>
<div id="menu5" style="display:none">
<a href="?s=Admin-Create-Show" class="on">网站生成选项</a>     
<a href="?s=Admin-Create-Index">生成网站首页</a>
<a href="?s=Admin-Create-Vodday-mday_1-1-jump-1">生成当天视频</a>
<a href="?s=Admin-Create-Newsday-mday_2-1">生成当天新闻</a>
<a href="?s=Admin-Create-Maps">生成网站地图</a>
<a href="?s=Admin-Create-Mytpl">生成自定义模板</a>
</div>
<div id="menu6" style="display:none">
<a href="?s=Admin-Admin-Show" class="on">后台管理员</a>
<a href="?s=Admin-Admin-Add">添加管理员</a>
<!--<a href="?s=Admin-User-Show">会员管理中心</a>
<a href="?s=Admin-User-Show">添加新用户</a> -->
<a href="?s=Admin-Cm-Show">评论管理</a>
<a href="?s=Admin-Gb-Show">留言管理</a>
<a href="?s=Admin-Gb-Show-cid-1">报错管理</a>
</div>
<div id="menu7" style="display:none">
<a href="?s=Admin-Data-Show" class="on">数据库备份</a>
<a href="?s=Admin-Data-Restore">数据库恢复</a>
<a href="?s=Admin-Data-Sql">执行SQL语句</a>
<a href="?s=Admin-Data-Replace">数据批量替换</a>  
</div>
<div id="menu8" style="display:none">
<a href="http://www.jiutoushe.cn/vip/bangzhu.html">官方帮助</a>
<a href="http://www.jiutoushe.cn/vip/tongzhi.html">官方通知</a>
<a href="http://www.jiutoushe.cn/vip/fuwu.html">官方服务</a>
<a href="http://www.jiutoushe.cn/vip/yuanma.html">更多源码</a>
<a href="https://shop116812653.taobao.com/search.htm" target="_blank">官方推荐</a>
<a href="http://www.jiutoushe.cn" target="_blank">官方网站</a> 
</div>

<div id="menu9" style="display:none">
<a href="?s=User-Member-manage">会员管理</a>
<a href="?s=User-Member-setting">会员配置</a>
<a href="?s=User-Member-mailsetting">邮箱配置</a>
<a href="?s=User-Member-connect">接口管理</a>  
<a href="?s=User-Member-Cm">评论管理</a> 
<a href="?s=User-Member-Gb">留言管理</a>
</div>

</td></tr>
<tr><td class="power">&#80;&#111;&#119;&#101;&#114;&#101;&#100;&#32;&#98;&#121; <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#106;&#105;&#117;&#116;&#111;&#117;&#115;&#104;&#101;&#46;&#99;&#110;" target="_blank">&#20061;&#22836;&#34503;&#24433;&#38498;</a></td></tr>
</table>
</body>
</html>