<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>《<?php echo ($vod_name); ?>》高清在线观看 <?php echo ($list_name); ?><?php echo ($list_name_big); ?>-<?php echo ($sitename); ?></title>
<meta name="keywords" content="<?php echo ($vod_name); ?><?php echo ($vod_title); ?>,<?php echo ($list_name); ?><?php echo ($vod_name); ?>,<?php echo ($vod_name); ?>国语,<?php echo ($vod_name); ?>在线观看,<?php echo ($vod_name); ?>下载">
<meta name="description" content="<?php echo ($vod_name); ?>，免费在线观看由<?php echo ($sitename); ?>收集于互联网，该<?php echo ($list_name); ?><?php echo ($list_name_big); ?>主要内容为<?php echo (msubstr($vod_content,0,60)); ?>，《<?php echo ($vod_name); ?>》是一部<?php echo (ff_mcat_admin($vod_mcid,$vod_cid)); ?><?php echo ($list_name); ?><?php echo ($list_name_big); ?>分为普通视频观看、P2P影音高清播放模式，其中普通观看模式需要安装Adobe Flash插件，P2P影音需要安装相应的高清播放器，如果你觉得<?php echo ($vod_name); ?>不错的话，推荐给你的朋友一起加速观看吧">

<script type="text/javascript">var Root='/';var Sid='';var Cid='';var Id='';</script>
<link rel="shortcut icon" href="/favicon.ico" charset="utf-8" />
<script language="javascript">
<!-- 
 window.onerror=function(){return true;} 
// -->
</script>
<script type="text/javascript">var Root='<?php echo ($root); ?>';var Sid='<?php echo ($sid); ?>';var Cid='<?php echo ($list_id); ?>';<?php if($sid == 1): ?>var Id='<?php echo ($vod_id); ?>';<?php else: ?>var Id='<?php echo ($news_id); ?>';<?php endif; ?></script>
<link type="text/css" rel="stylesheet" href="<?php echo ($root); ?>style/css/index.css" />
<link rel="shortcut icon" href="<?php echo ($root); ?>favicon.ico" charset="utf-8" />


<script type="text/javascript">
	// Skin
	$(function () {
		var $li = $("#skin li"); 
		$li.click(function (){ 
			switchSkin(this.id);
		});
		// Save Cookie
		var cookie_skin = $.cookie("MyCssSkin");
		if (cookie_skin) {                       
			switchSkin(cookie_skin); 
		}
	});
	function switchSkin(skinName) {   
		$("#" + skinName).addClass("selected") 
			.siblings().removeClass("selected"); 
		$("#cssfile").attr("href", "/style/css/" + skinName + ".css");
		$.cookie("MyCssSkin", skinName, { path: '/', expires: 10 }); 
	}
</script>
<?php
$s_area=explode(',',C('play_area'));
$s_language=explode(',',C('play_language'));
$s_year=explode(',',C('play_year'));
$s_picm=array('1','2');
$s_letter=(range(A,Z));
$s_order=array('addtime','hits','gold');
$mov_id = 1;
$tv_id = 2;
$dm_id = 3;
$zy_id = 4;
$wei_id = 35;
$path=C('site_path');
if(C('url_rewrite')){
$useurl= C('site_path');
$vodlist="vod-show-id";
}
else{
$useurl="?s=";
$vodlist="?s=vod-show-id";
}
?>
<link href="<?php echo ($tpl); ?>css/user.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($tpl); ?>css/header.css" rel="stylesheet" type="text/css" />
<script src="<?php echo ($tpl); ?>js/top_js.js" type="text/javascript"></script>
<script src="<?php echo ($tpl); ?>js/zhnew.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo ($tpl); ?>css/play.css">
<link href="<?php echo ($tpl); ?>css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">var ie6Load=false;</script>
</head>
<body>
</head>
<body>

<!-- header -->
<div class="eb-headnav eb-headnav-xklong">
	<b class="eb-headnav-bg"></b>
	 <div class="eb-headnav-top g-clear"> 
	<a href="<?php echo ($root); ?>" class="eb-headnav-logo" target="_self"></a>
	<form class='js-eb-search eb-search eb-search-xklong' id="search" name="search"  method="POST" action="" onSubmit="return qrsearch();">
     <div class='js-eb-suggest eb-suggest  eb-suggest-xklong g-clear' id='js-eb-suggest'>
    <input class='eb-suggest-query js-query' type="text" id="wd" name="wd" value="请在此处输入影片片名或演员名称。" onfocus="if(this.value=='请在此处输入影片片名或演员名称。'){this.value='';}" onblur="if(this.value==''){this.value='请在此处输入影片片名或演员名称。';};" />
    <div class='eb-suggest-wrap js-wrap' style='display:none'>
        <div class='eb-suggest-bg'></div>
        <ul class='js-list'></ul>
    </div>
</div><input type="submit" id="searchbutton"  class="eb-search-btn" value="">
</form>

<ul class="eb-headnav-ucenter" id="sign" >
<li  id="loginbarx" class="ucenter-wrap ucenter-my drop-down"><a class="nav-link" id="innermsg" href="/?s=user-center-login.html"><span class="ucenter-item js-my">会员中心</span></a>
<div class="drop-box" id="nav-signin" style="display:none;">
   <p class="drop-box-arrow"></p>
    <form id="loginform" action="/?s=user-center-login.html" method="post" onsubmit="return false;">
    <div class="ui-form ui-signin">
      <div class="ui-form-item ui-form-placeholder">
        <label class="ui-label" for="username">帐号或邮箱</label>
        <input type="text" id="username" name="username" class="ui-input" value="">
      </div>
      <div class="ui-form-item ui-form-placeholder">
        <label class="ui-label" for="password">密码：</label>
        <input type="password" id="password" name="password" maxlength="20" class="ui-input" value="" />
        <a class="ui-icon forgot-psw" title="忘记密码" href="/?s=user-center-forgetpwd.html">忘记密码</a></div>
        <div class="ui-form-item fn-clear">
              <label class="ui-label">&nbsp;</label>
              <label for="agreement" class="ui-label-checkbox">
                <input type="checkbox" value="" name="cookietime" id="cookietime" checked="checked" value="2592000">
                <input type="hidden" name="notforward" id="notforward" value="1">
                <input type="hidden" name="dosubmit" id="dosubmit" value="1">记住我的登录 </label>
              <input type="submit" id="loginbt" class="ui-button" value="登 录">
    </div>
  </div>
  <!-- // ui-signin end -->
  <div class="signin-assist fn-clear"><a class="ui-icon qq-login" href="/?s=user-center-qqlogin.html" >用QQ帐号登录</a>
    <p><a href="/?s=user-center-reg.html" target="_blank" class="reg-btn">还没有账号?</a></p>
  </div>
  <!-- // signin-assist end -->
</form>
</div>
		</li>
	
             <li id="nav-looked" class="ucenter-wrap ucenter-record drop-down">
				<a href="javascript:" class="ucenter-item">观看记录</a>
				<div class="drop-box">
            <p class="drop-box-arrow"></p>
            <div class="looked-list">
              <p><a rel="nofollow" class="close-his" target="_self" href="javascript:;">关闭</a><a class="close-hiss" rel="nofollow" href="javascript:;" id="emptybt" data="1" target="_self">清空播放记录</a></p>
              <ul class="highlight" id="playhistory"></ul>
			<div class="his-todo" id="morelog" style="display:none;"></div>
            
           
            
           <script type="text/javascript">PlayHistoryObj.viewPlayHistory('playhistory');</script>
            <!-- // looked-list end -->
          </div>
        </li>
			<li class="ucenter-wrap ucenter-app">
				<a href="https://item.taobao.com/item.htm?id=526520981822"  target="_blank" class="ucenter-item">本站源码</a>
			</li>
		</ul>
	</div>
	<p class="eb-headnav-line"></p>
	<div class="eb-headnav-bottom g-clear js-nav">
	<div class="eb-headnav-nav js-data">
      <a href="<?php echo ($root); ?>" target="_self" class="nav-item current">首页</a>    
       <a class="nav-item " target="_self" href="<?php echo getlistname(2,'list_url');?>"><i class="navv dianshiju"></i>电视剧</a>
	   <a class="nav-item " target="_self" href="<?php echo getlistname(1,'list_url');?>"><i class="navv dianying"></i>电影</a>
	   <a class="nav-item " target="_self" href="<?php echo getlistname(3,'list_url');?>"><i class="navv dongman"></i>动漫</a>
	   <a class="nav-item " target="_self" href="<?php echo getlistname(4,'list_url');?>"><i class="navv zongyi"></i>综艺</a>
	   <a class="nav-item " target="_self" href="<?php echo getlistname(35,'list_url');?>"><i class="navv weidianying"></i>微电影</a>
           <a class="nav-item " target="_self" href="<?php echo getlistname(51,'list_url');?>"><i class="navv gaoxiaoshipin"></i>搞笑视频</a>
           <a class="nav-item " target="_self" href="<?php echo getlistname(52,'list_url');?>"><i class="navv gaoxiaoshipin"></i>高清MV</a>
	   <a class="nav-item " target="_self" href="<?php echo getlistname(53,'list_url');?>"><i class="navv live"></i>电视直播</a>

            		</div>
		<div class="eb-headnav-subnav">  
                <a href="<?php echo ff_mytpl_url('my_top.html');?>" target="_self" class=" nav-item ">热播榜</a>    
                <a href="<?php echo ff_mytpl_url('my_new.html');?>" target="_self" class=" nav-item ">最近更新</a>    
                 <a href="/style/banzhu/" target="_self" class=" nav-item ">帮助</a> 
                <a href="<?php echo ($url_gbshow); ?>" target="_self" class=" nav-item ">留言</a>    
            	</div>
	</div>
</div>
<script>
function fav(){
		var url = window.location.href;					 
		try{
			window.external.addFavorite(url,document.title);
		}catch(err){
			try{
				window.sidebar.addPanel(document.title, url,"");
			}catch(err){
				alert("请使用Ctrl+D为您的浏览器添加书签！");
			}
		}
}
	$(document).ready(function(){
		$("#loginbarx").load("<?php echo ($root); ?>index.php?s=User-Center-usernav&forward="+encodeURIComponent(location.href)+"&random"+ new Date().getTime());
	});
 </script>
<div class="eb-headbg"></div>
<!-- //header -->
<link href="/style/css/style2.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/style/js/vod.js"></script>
<?php	
$yc = array('down');
foreach($vod_playlist as $kk=>$data){
	foreach($yc as $pids){
		if($pids == $data['playname']){
			unset($vod_playlist[$kk]);
		}
	}
}
?> 
<div class="wz"><span>您当前的位置：</span><a href="<?php echo ($siteurl); ?>">首页</a><?php if($list_pid == $mov_id): ?><a href="<?php echo ($list_url_big); ?>"><?php echo ($list_name_big); ?></a><?php elseif($list_pid == $tv_id): ?><a href="<?php echo ($list_url_big); ?>"><?php echo ($list_name_big); ?></a><?php else: ?><?php endif; ?><a href="<?php echo ($list_url); ?>"><?php echo ($list_name); ?></a><?php echo (ff_mcat_url($vod_mcid,$vod_cid)); ?><a class="current" href="<?php echo ($vod_readurl); ?>"><?php echo ($vod_name); ?><?php echo ($vod_jiname); ?></a><div class="wfgk"><a href="/style/banzhu/">无法观看?</a></div>
</div>
<div class="pad980"><?php echo getadsurl('top980');?></div>
<div id="play-focus">
  <!-- // layout End -->
  <div  class="w1000">
<div <?php if($w > 695): ?><?php else: ?>class="w685"<?php endif; ?> id="players">
<?php echo ($vod_player); ?>
</div>
    <!-- // player End -->
    <?php if($w > 695): ?><?php else: ?>
<div class="w300" id="mright"><?php echo getadsurl('play_left0');?>
<div class="h10"></div>
<?php echo getadsurl('bofangqiyou');?><?php endif; ?>
    <!-- // player-ad End -->
  </div>
    <script>
if(PlayHistoryObj){
	var vod_id = "<?php echo ($vod_id); ?>" ;
	    var vod_pid = "<?php echo ($vod_pid); ?>" ;
	    var vod_sid = "<?php echo ($vod_sid); ?>" ;
	  	var url_name = "" ;
	  	var vod_maxnum = "" ;
	if(ff_urls){
		var json = eval("(" + ff_urls + ")");  //整个数组
		if(json){
			url_name = json.Data[vod_sid].playurls[(vod_pid - 1)][0] ;  //获取结果集
			vod_maxnum = json.Data[vod_sid].playurls.length ;
		}
	}
	var json = {
		'vod_id' : vod_id ,
		'vod_pid': vod_pid,
		'vod_sid': vod_sid,
		'vod_name' : "<?php echo ($vod_name); ?>",
		'url_name' : url_name,
		'vod_maxnum':vod_maxnum
	} ;
	PlayHistoryObj.addPlayHistory(json,"<?php echo ($vod_readurl); ?>",window.location.href);
}
</script>
    <!-- // idt修改 -->  
  <input type='hidden' name='_void_id' id='_void_id' value='<?php echo ($vod_id); ?>'/>
  <div class="p10idt w1000">
		<div class="p10idt-gold">
		  <span><?php echo ($vod_gold); ?></span>
		</div>
		<div class="loveidbox user-bt">
        <a rel="nofollow" class="sect-btn" id="wish" href="javascript:void(0);" data="<?php echo ($root); ?>index.php?s=User-comm-savelove-id-<?php echo ($vod_id); ?>" style="">收藏</a>
        <div class="sect-show"><a rel="nofollow" class="cancel" href="javascript:void(0);" val="0" id="cancelbt" data="<?php echo ($root); ?>index.php?s=User-comm-dellove-id-<?php echo ($vod_id); ?>" >已收藏</a> </div> </div>
        <div class="remind user-bt"><a rel="nofollow" class="rss-btn sect-btn" id="dingyue" href="javascript:void(0);" data="<?php echo ($root); ?>index.php?s=User-Comm-saveremind-id-<?php echo ($vod_id); ?>">订阅</a>
          <div class="rss-show sect-show"><a rel="nofollow" class="cancel" href="javascript:void(0);" val="0" data="<?php echo ($root); ?>index.php?s=User-Comm-delremind-id-<?php echo ($vod_id); ?>" id="delbt">已订阅</a></div>
        </div>
          <div class="updownbtnbox">
		<a rel="nofollow" href="javascript:void(0)" class="Up" id="Up"><span></span></a><a rel="nofollow" href="javascript:void(0)" class="Down" id="Down"><span></span></a>
		</div>
		<div class="playfxbox">
    <div class="bread-share aright">
      <div class="bshare-custom"><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到微信" class="bshare-weixin"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/button.js#style=-1&uuid=&pophcol=2&lang=zh"></script><a class="bshareDiv" onclick="javascript:return false;"></a><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
	</div>
	</div>
</div> 
<!-- // idt修改 -->
  <!-- // play End -->
</div>
<?php $lay=$vod_playname; ?>
<?php $ji=$vod_pid-1; ?>
<div class="publicbox w1000" id="detail-list">
	<div class="vodhottitle">
    <div class="play_list" >
            <?php if($list_pid == $mov_id): ?><?php if(is_array($vod_playlist)): $i = 0; $__LIST__ = array_slice($vod_playlist,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><dd <?php if(($i)  >  "1"): ?><?php else: ?>class="current"<?php endif; ?>><a title="<?php echo ($ppvod["playername"]); ?>" id="<?php echo ($ppvod["playname"]); ?>-pl" ><span></span><em class="no_v"> <?php $countji=count($ppvod['son'])-1;if($ppvod['son']>10){krsort($ppvod['son']);} ?><?php if(is_array($ppvod['son'])): $iii = 0; $__LIST__ = array_slice($ppvod['son'],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$iii;$mod = ($iii % 2 )?><?php echo (msubstr($ppvod["playname"],0,3)); ?><?php endforeach; endif; else: echo "" ;endif; ?></em></a></dd></equal><?php endforeach; endif; else: echo "" ;endif; ?> 
          <?php elseif($list_pid == $tv_id): ?>
                     <?php if(is_array($vod_playlist)): $i = 0; $__LIST__ = array_slice($vod_playlist,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><dd <?php if(($i)  >  "1"): ?><?php else: ?>class="current"<?php endif; ?>><a title="<?php echo ($ppvod["playername"]); ?>" id="<?php echo ($ppvod["playname"]); ?>-pl" ><span></span><em class="no_v"> <?php $countji=count($ppvod['son'])-1;if($ppvod['son']>10){krsort($ppvod['son']);} ?><?php if(is_array($ppvod['son'])): $iii = 0; $__LIST__ = array_slice($ppvod['son'],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$iii;$mod = ($iii % 2 )?><?php if($vod_continu != 0): ?>第<?php echo ($ppvod["playcount"]); ?>集<?php else: ?><?php echo ($ppvod["playcount"]); ?>集全<?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></em></a></dd></equal><?php endforeach; endif; else: echo "" ;endif; ?>  
         <?php elseif($list_id == $zy_id): ?>
         <?php if(is_array($vod_playlist)): $i = 0; $__LIST__ = array_slice($vod_playlist,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><dd <?php if(($i)  >  "1"): ?><?php else: ?>class="current"<?php endif; ?>><a title="<?php echo ($ppvod["playername"]); ?>" id="<?php echo ($ppvod["playname"]); ?>-pl" ><span></span><em class="no_v"> <?php $countji=count($ppvod['son'])-1;if($ppvod['son']>10){krsort($ppvod['son']);} ?><?php if(is_array($ppvod['son'])): $iii = 0; $__LIST__ = array_slice($ppvod['son'],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$iii;$mod = ($iii % 2 )?><?php if($vod_continu != 0): ?><?php echo ($ppvod["playcount"]); ?>期<?php else: ?><?php echo ($ppvod["playcount"]); ?>期全<?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></em></a></dd></equal><?php endforeach; endif; else: echo "" ;endif; ?>  
        <?php elseif($list_id == $dm_id): ?>
            <?php if(is_array($vod_playlist)): $i = 0; $__LIST__ = array_slice($vod_playlist,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><dd <?php if(($i)  >  "1"): ?><?php else: ?>class="current"<?php endif; ?>><a title="<?php echo ($ppvod["playername"]); ?>" id="<?php echo ($ppvod["playname"]); ?>-pl" ><span></span><em class="no_v"><?php $countji=count($ppvod['son'])-1;if($ppvod['son']>10){krsort($ppvod['son']);} ?><?php if(is_array($ppvod['son'])): $iii = 0; $__LIST__ = array_slice($ppvod['son'],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$iii;$mod = ($iii % 2 )?><?php if($vod_continu != 0): ?>第<?php echo ($ppvod["playcount"]); ?>集<?php else: ?><?php echo ($ppvod["playcount"]); ?>集全<?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></em></a></dd></equal><?php endforeach; endif; else: echo "" ;endif; ?> 
            <?php else: ?>
            <?php if(is_array($vod_playlist)): $i = 0; $__LIST__ = array_slice($vod_playlist,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><dd <?php if(($i)  >  "1"): ?><?php else: ?>class="current"<?php endif; ?>><a title="<?php echo ($ppvod["playername"]); ?>" id="<?php echo ($ppvod["playname"]); ?>-pl" ><span></span><em class="no_v"> <?php $countji=count($ppvod['son'])-1;if($ppvod['son']>10){krsort($ppvod['son']);} ?><?php if(is_array($ppvod['son'])): $iii = 0; $__LIST__ = array_slice($ppvod['son'],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$iii;$mod = ($iii % 2 )?><?php echo (msubstr($ppvod["playname"],0,3)); ?><?php endforeach; endif; else: echo "" ;endif; ?></em></a></dd></equal><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?>
         </div>   
        <div class="txtt"><a rel="nofollow" href="<?php echo ($url_gbshow); ?>" target="_blank">播放报错</a></div>
    </div>
 <?php if(is_array($vod_playlist)): $i = 0; $__LIST__ = array_slice($vod_playlist,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><?php if(!in_array(($ppvod["playname"]), explode(',',"xunlei"))): ?><div class="vodplaybox" id="<?php echo ($ppvod["playname"]); ?>-pl-list" <?php if(($i)  >  "1"): ?>style="display:none"<?php else: ?>style="display:block"<?php endif; ?>>
			<div class="wxts" style="margin:0px 20px 10px 20px;">
				<div class="snvtvb" ><span class="snvd">温馨提示：</span>[DVD：标准清晰版]&nbsp;[BD：高清无水印]&nbsp;[HD：高清版]&nbsp;[TS：抢先非清晰版] - 其中，BD和HD版本不太适合4M以下的宽带的用户和网速过慢的用户观看。</div>
                <?php if($ppvod["playname"] == bdhd): ?><div class="snvtvs" ><span class="snvd">[百度影音]：</span>需要安装播放器才能观看<a class="playdown_btn" rel="nofollow" href="http://dl.p2sp.baidu.com/BaiduPlayerContent/OfflineBaiduPlayer_151.exe">点击下载最新版本</a></div>
                <?php elseif($ppvod["playname"] == qvod): ?>
                <div class="snvtvs" ><span class="snvd">[快播]：</span>需要安装播放器才能观看<a class="playdown_btn" rel="nofollow" href="http://dl.kuaibo.com/QvodSetupPlus5.exe">点击下载最新版本</a></div>
                <?php else: ?>
             <div class="snvtvs" ><span class="snvd">[FLASH]：</span>需要安装FLASH插件,点击下载最新的<a rel="nofollow" href="http://get.adobe.com/tw/flashplayer/" target="_blank">Adobe Flash Player</a>, 在线观看无须安装播放器。</div><?php endif; ?>
        </div>
        <?php $countjii=count($ppvod['son'])-1;if($ppvod['son']>10){krsort($ppvod['son']);} ?>
        <?php if(($countjii)  >  "5"): ?><div class="order">排序：<a rel="nofollow" class="desc" href="javascript:void(0);" data="<?php echo ($i-1); ?>">降序</a></div> <?php else: ?><?php endif; ?>
            <p class="player_list">
         <?php $countji=count($ppvod['son'])-1;if($ppvod['son']>10){krsort($ppvod['son']);} ?>
         <?php if(is_array($ppvod['son'])): $iii = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): ++$iii;$mod = ($iii % 2 )?><a <?php if(($i)  !=  "1"): ?>rel="nofollow"<?php endif; ?> target="_blank" href="<?php echo ($ppvodson["playurl"]); ?>" title="<?php echo ($ppvodson["playname"]); ?>"><?php echo (msubstr($ppvodson["playname"],0,10)); ?><?php if(($iii)  ==  "1"): ?><?php $add_time = $vod_addtime;$today = date("Ymd"); if(date("Ymd", $add_time) == $today) {
echo "<span class='new'></span>";} else {echo "";} ?><?php endif; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
</p> 
   </div><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>       
</div>
  <?php if(is_array($vod_playlist)): $i = 0; $__LIST__ = $vod_playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><?php if($ppvod["playname"] == xunlei): ?><div class="ad980">
<?php if(is_array($vod_playlist)): $playerkey = 0; $__LIST__ = $vod_playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$playerkey;$mod = ($playerkey % 2 )?><?php if(($ppvod["playname"])  ==  "xunlei"): ?><div class="ui-box download-focus"><div class="ui-title"><span>迅雷下载观看</span><h2><strong>下载观看</strong></h2></div><ul class="download-group fn-clear downurl"><script type="text/javascript">var GvodUrls1 = "<?php if(is_array($ppvod['son'])): $k = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): ++$k;$mod = ($k % 2 )?><?php echo ($ppvodson["playname"]); ?>$<?php echo ($ppvodson["playpath"]); ?>###<?php endforeach; endif; else: echo "" ;endif; ?>";echoDown(GvodUrls1,1);</script></ul><!-- // download-group end --><div class="download-footer"><div class="download-footer-group"><table><tbody><tr><td class="ckb ckall"><input type="checkbox"  name="checkall" onclick="CheckAll(1)" id="allcheck1"/></td><td class="tit"><label id="s1p0" for="allxz">全选</label></td><td class="xlx"><a class="ui-button" href="javascript:;" onclick="zhongxz(1)">迅雷下载选中文件</a></td><td class="sms"><p>迅雷下载和看看播放请先《<a href="http://dl.xunlei.com/" rel="nofollow" target="_blank">安装迅雷</a>》和《<a href="/style/banzhu/index.html" target="_blank">查看使用帮助</a>》</p></td></tr></tbody></table></div></div><!-- // download-footer end --><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></div>

      </div>
       <?php else: ?><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<div class="pad980"><?php echo getadsurl('play960');?></div>
<div  class="w1000">
    <div class="ui-titlej">
      <ul>
        <li id="latest1" onclick="setTab('latest',1,3);" class="current">除了"<strong><?php echo ($vod_name); ?></strong>"你也可能喜欢以下影片：</li>
        <li id="latest2" onclick="setTab('latest',2,3);" class="">同主演</li>
        <li id="latest3" onclick="setTab('latest',3,3);" class="">同导演</li>
      </ul>
    </div>
    <div class="box" id="con_latest_1">
  <ul class="img-listt">
       <?php $vod_gold=ff_mysql_vod('cid:'.$list_id.';limit:6;order:rand()'); ?>
     <?php if(is_array($vod_gold)): $i = 0; $__LIST__ = $vod_gold;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a class="play-img"  href="<?php echo ($ppvod["vod_readurl"]); ?>" title="<?php echo ($ppvod["list_name"]); ?><?php echo ($ppvod["vod_name"]); ?>" ><img class="loading" width="110" height="150" src="<?php echo ($ppvod["vod_picurl"]); ?>" data-lazyload-type="auto" alt="<?php echo ($ppvod["vod_name"]); ?>"/>
        <label class="mask"></label>
        <label class="text"><?php if($ppvod["vod_continu"] != 0): ?><?php echo ($ppvod["lastplay_name"]); ?><?php else: ?><?php echo ($ppvod["vod_title"]); ?><?php endif; ?></label>
        <label class="score"><?php if(($ppvod["vod_gold"])  ==  "0"): ?><?php echo ($ppvod["vod_gold"]); ?><?php else: ?><?php echo ($ppvod["vod_gold"]); ?><?php endif; ?></label>
        </a>
        <h3><a target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo (msubstr($ppvod["vod_name"],0,25)); ?></a></h3>
      </li><?php endforeach; endif; else: echo "" ;endif; ?> 
      </ul>
      <ul class="txt-list-small">
      <?php $hot_week = ff_mysql_vod('cid:'.$list_id.';limit:5,20;order:vod_hits_month desc,vod_addtime desc'); ?>
         <?php if(is_array($hot_week)): $i = 0; $__LIST__ = $hot_week;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><span><?php echo ($i); ?>.</span><a target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo (msubstr($ppvod["vod_name"],0,25)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 
      </ul>
    </div>
    <div class="box" id="con_latest_2" style="display:none">
      <ul class="img-listt">
		<?php $tab_actor = ff_mysql_vod('actor:'.msubstr($vod_actor,0,3).';num:6;order:vod_hits desc,vod_id desc');
if(!$tab_actor || count($tab_actor) == 1){
$tab_actor = ff_mysql_vod('cid:'.$vod_cid.';num:6;order:vod_stars desc,vod_hits desc');
} ?>
			<?php if(is_array($tab_actor)): $i = 0; $__LIST__ = $tab_actor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a class="play-img"  href="<?php echo ($ppvod["vod_readurl"]); ?>" title="<?php echo ($ppvod["list_name"]); ?><?php echo ($ppvod["vod_name"]); ?>" ><img class="loading" width="110" height="150" src="<?php echo ($ppvod["vod_picurl"]); ?>" data-lazyload-type="auto" alt="<?php echo ($ppvod["vod_name"]); ?>"/>
			<label class="mask"></label>
			<label class="text"><?php if($ppvod["vod_continu"] != 0): ?><?php echo ($ppvod["lastplay_name"]); ?><?php else: ?><?php echo ($ppvod["vod_title"]); ?><?php endif; ?></label>
			<label class="score"><?php if(($ppvod["vod_gold"])  ==  "0"): ?><?php echo ($ppvod["vod_gold"]); ?><?php else: ?><?php echo ($ppvod["vod_gold"]); ?><?php endif; ?></label>
			</a>
			<h3><a target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></h3>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
    </div>
    <div class="box" id="con_latest_3" style="display:none">
      <ul class="img-listt">
		<?php $tab_director = ff_mysql_vod('director:'.msubstr($vod_director,0,3).';num:6;order:vod_hits desc,vod_id desc');
if(!$tab_director || count($tab_director) == 1){
$tab_director = ff_mysql_vod('cid:'.$vod_cid.';num:6;order:vod_stars desc,vod_hits desc');
} ?>
			<?php if(is_array($tab_director)): $i = 0; $__LIST__ = $tab_director;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a class="play-img"  href="<?php echo ($ppvod["vod_readurl"]); ?>" title="<?php echo ($ppvod["list_name"]); ?><?php echo ($ppvod["vod_name"]); ?>" ><img class="loading" width="110" height="150" src="<?php echo ($ppvod["vod_picurl"]); ?>" data-lazyload-type="auto" alt="<?php echo ($ppvod["vod_name"]); ?>"/>
			<label class="mask"></label>
			<label class="text"><?php if($ppvod["vod_continu"] != 0): ?><?php echo ($ppvod["lastplay_name"]); ?><?php else: ?><?php echo ($ppvod["vod_title"]); ?><?php endif; ?></label>
			<label class="score"><?php if(($ppvod["vod_gold"])  ==  "0"): ?><?php echo ($ppvod["vod_gold"]); ?><?php else: ?><?php echo ($ppvod["vod_gold"]); ?><?php endif; ?></label>
			</a>
			<h3><a target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></h3>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
    </div>
  </div>

<div class="pad980"><?php echo getadsurl('top960');?></div>
﻿<div class="footer_nav">
<p class="w1000">
<a href="<?php echo ff_mytpl_url('my_new.html');?>">最近更新</a> - <a href="<?php echo ($url_gbshow); ?>">网站留言</a> - <a href="/style/banzhu/">常见问题</a> - <a href="/">广告投放</a> - <a href="/">免责声明</a> - <a href="/">官方微博</a>-<?php echo ($tongji); ?></a>
</p>
</div>


<div class="footer">
<p class="w1000">
<br>
<a>本网站提供新电视剧和电影资源均系收集于各大视频网站，本网站只提供web页面服务，并不提供影片资源存储，也不参与录制、上传</br>
若本站收录的节目无意侵犯了贵司版权，请给<a href="mailto:<?php echo ($email); ?>"><?php echo ($email); ?></a>邮箱来信，我们将在第一时间处理与回复,谢谢
</br>Copyright &#169; 2006-2016 <a href="<?php echo ($siteurl); ?>"><?php echo ($sitename); ?></a><a href="<?php echo ($siteurl); ?>"><font face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#CC0000">Www.JiuTouShe.Cn</font></font></b></a>.All Rights Reserved .


<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1257007139'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1257007139%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>



</p>

<script>

(function(){

    var bp = document.createElement('script');

    bp.src = '//push.zhanzhang.baidu.com/push.js';

    var s = document.getElementsByTagName("script")[0];

    s.parentNode.insertBefore(bp, s);

})();

</script>

</div>


</body>
</html>