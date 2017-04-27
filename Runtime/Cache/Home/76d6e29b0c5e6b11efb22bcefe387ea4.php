<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?>-最新最全影视免费观看</title>
<meta name="keywords" content="<?php echo ($keywords); ?>" />
<meta name="description" content="<?php echo ($description); ?>" />
<meta name="application-name" content="九头蛇影院" />

<base target="_blank" />
<meta name="application-name" content="九头蛇影院 - 最新最全影视免费观看" />
<script language="javascript">
<!-- 
 window.onerror=function(){return true;} 
// -->
</script>
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
<script type="text/javascript">uaredirect("");</script>
<link href="<?php echo ($tpl); ?>css/index.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($tpl); ?>css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">var ie6Load=false;</script>
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
<div class="wz"><span>您当前的位置：</span><a href="<?php echo ($root); ?>">首页</a><?php if($list_pid == 1): ?><a href="<?php echo getlistname(1,'list_url');?>">电影</a><?php elseif($list_pid == 2): ?><a href="<?php echo getlistname(2,'list_url');?>">电视剧</a><?php else: ?><?php endif; ?><a class="current" href="<?php echo (getlisturl($list_id)); ?>"><?php echo (getlistname($list_id)); ?></a></ul></div>
<div class="ad980"><?php echo getadsurl('list980');?></div>
<div class="all p_list">
<ul class="side_nav aleft">
<li class="first no_border"><span>分类检索</span></li>
<?php if(is_array($list_menu)): $i = 0; $__LIST__ = array_slice($list_menu,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><?php if(($ppvod["list_pid"])  ==  "0"): ?><li <?php if(($ppvod["list_id"])  ==  $list_id): ?>class="curr"<?php endif; ?><?php if(($ppvod["list_id"])  ==  $list_pid): ?>class="curr"<?php endif; ?>><a target="_self" href="<?php echo ($ppvod["list_url"]); ?>"><?php echo ($ppvod["list_name"]); ?></a></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="p_vodlist aright">
<div class="ui-title"><h4 class="name aleft"><?php echo (getlistname($list_id)); ?></h4>
      <a class="word aright" href="<?php echo (getlisturl($list_id)); ?>" target="_blank"></a>
      <span><a href="<?php echo ($root); ?><?php echo ($vodlist); ?>-<?php echo ($list_id); ?><?php echo ($u_mcid); ?><?php echo ($u_lz); ?><?php echo (urlencode($u_area)); ?><?php echo ($u_year); ?><?php echo (urlencode($u_language)); ?><?php echo ($u_letter); ?><?php echo ($u_order); ?><?php echo ($u_picm); ?>.html"  class="conreset">重置条件</a></span>
      <p class="conbread"></p>
    </div>
 <div class="select_area" id="movtxtboxs">
 <?php if($list_id == $dm_id): ?><?php elseif($list_id == $zy_id): ?>
<?php elseif($list_id == $wei_id): ?>
<?php else: ?>
<div class="clearfix">
   <h5>分类：</h5>
  <ul>
<?php if(empty($list_pid)): ?><?php $array_listid = getlistarr($list_id); ?>
<li><a  <?php if(($list_pid)  ==  "0"): ?>class="current"<?php endif; ?>  target="_self" href="<?php echo ($root); ?><?php echo ($vodlist); ?>-<?php echo ($list_pid); ?><?php echo ($u_mcid); ?><?php echo ($u_area); ?><?php echo ($u_year); ?><?php echo ($u_language); ?><?php echo ($u_letter); ?><?php echo ($u_order); ?><?php echo ($u_picm); ?>.html" data="id-<?php echo ($list_pid); ?>">全部</a></li>
<?php if(is_array($array_listid)): $i = 0; $__LIST__ = array_slice($array_listid,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ff_listid): ++$i;$mod = ($i % 2 )?><li><a <?php if(($list_id)  ==  $ff_listid): ?>class="current"<?php endif; ?> href="<?php echo getlistname($ff_listid,'list_url');?>" data="id-<?php echo ($ff_listid); ?>"><?php echo getlistname($ff_listid);?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
<?php else: ?>
 <li><a  <?php if(($list_lid)  ==  "0"): ?>class="current"<?php endif; ?>  target="_self" href="<?php echo ($root); ?><?php echo ($vodlist); ?>-<?php echo ($list_pid); ?><?php echo ($u_mcid); ?><?php echo ($u_area); ?><?php echo ($u_year); ?><?php echo ($u_language); ?><?php echo ($u_letter); ?><?php echo ($u_order); ?><?php echo ($u_picm); ?>.html" data="id-<?php echo ($list_pid); ?>">全部</a></li>
 <?php $array_listid = getlistarr($list_pid); ?><?php if(is_array($array_listid)): $i = 0; $__LIST__ = array_slice($array_listid,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ff_listid): ++$i;$mod = ($i % 2 )?><li><a <?php if(($list_id)  ==  $ff_listid): ?>class="current"<?php endif; ?> href="<?php echo getlistname($ff_listid,'list_url');?>" data="id-<?php echo ($ff_listid); ?>"><?php echo getlistname($ff_listid);?></a></li><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?>
</ul></div><?php endif; ?>
 <div class="clearfix" style="position:relative;">
  <h5>类型：</h5>
   <ul id="yyboxs">
<li><a <?php if (!isset($_GET['mcid'])){ ?> class="current"<?php } ?>  href="<?php echo ($root); ?><?php echo ($vodlist); ?>-<?php echo ($list_id); ?><?php echo ($u_mcid); ?><?php echo ($u_lz); ?><?php echo (urlencode($u_area)); ?><?php echo ($u_year); ?><?php echo (urlencode($u_language)); ?><?php echo ($u_letter); ?><?php echo ($u_order); ?><?php echo ($u_picm); ?>.html" data="mcid-0">全部</a></li>
<?php if(is_array($mcat)): $i = 0; $__LIST__ = array_slice($mcat,0,31,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat_menu): ++$i;$mod = ($i % 2 )?><li><a  <?php if(($cat_menu["m_cid"])  ==  $_GET['mcid']): ?>class="current"<?php endif; ?>  href="<?php echo ($root); ?><?php echo ($vodlist); ?>-<?php echo ($list_id); ?>-mcid-<?php echo ($cat_menu["m_cid"]); ?><?php echo ($u_lz); ?><?php echo (urlencode($u_area)); ?><?php echo ($u_year); ?><?php echo ($u_language); ?><?php echo ($u_letter); ?><?php echo ($u_order); ?><?php echo ($u_picm); ?>.html" data='mcid-<?php echo ($cat_menu["m_cid"]); ?>'><?php echo ($cat_menu["m_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul><a rel="nofollow" href="#" id="yymoerbtns" class="yymoerbtns">更多</a></div>
<?php if($list_id == $wei_id): ?><?php elseif($list_id == $mov_id): ?>
<?php else: ?>
<div class="clearfix">
     <h5>状态：</h5>
          <ul>
       <li><a<?php if (!isset($_GET['lz'])){ ?> class="current"<?php } ?> href="<?php echo ($root); ?>vod-type-id-<?php echo ($list_id); ?><?php echo ($u_mcid); ?><?php echo (urlencode($u_area)); ?><?php echo ($u_year); ?><?php echo (urlencode($u_language)); ?><?php echo ($u_letter); ?><?php echo ($u_order); ?><?php echo ($u_picm); ?>.html" data="lz-0">全部</a></li>
<?php echo "<li><a href='".$root.$vodlist."-".$list_id.$u_lz.$u_mcid.urlencode($u_area).$u_year.$u_language.$u_letter.$u_picm; ?>-lz-1.html' <?php if($_GET[lz]=="1") echo "class='current'"; ?> data="lz-1">连载中</a></li>
 <?php echo "<li><a href='".$root.$vodlist."-".$list_id.$u_lz.$u_mcid.urlencode($u_area).$u_year.$u_language.$u_letter.$u_picm; ?>-lz-2.html' <?php if($_GET[lz]=="2") echo "class='current'"; ?> data="lz-2">已完结</a></li>     
 </ul>          
        </div><?php endif; ?>   
        <div class="clearfix">
        <h5>地区：</h5>
          <ul>
       <li><a <?php if (!isset($_GET['area'])){ ?> class="current"<?php } ?> href="<?php echo ($root); ?>vod-type-id-<?php echo ($list_id); ?><?php echo ($u_mcid); ?><?php echo ($u_lz); ?><?php echo ($u_year); ?><?php echo (urlencode($u_language)); ?><?php echo ($u_letter); ?><?php echo ($u_order); ?><?php echo ($u_picm); ?>.html" data="area-0">全部</a></li> 
<?php  $out=0; foreach($s_area as $yid=>$avalue){ if($_GET[area]==$avalue) $class=" class='current'";else $class=NULL;echo "<li ><a $class href='".$root.$vodlist."-".$list_id.$u_mcid.$u_lz.$u_year."-area-".urlencode($avalue).$u_language.$u_order.$u_picm.".html' data='area-".urlencode($avalue)."'>".$avalue."</a></li>";if($out>12) break;else $out++;}?></ul></div>
        <div class="clearfix">
        <h5>年代：</h5>
          <ul>
        <li><a <?php if (!isset($_GET['year'])){ ?> class="current"<?php } ?> href="<?php echo ($root); ?>vod-type-id-<?php echo ($list_id); ?><?php echo ($u_mcid); ?><?php echo ($u_lz); ?><?php echo (urlencode($u_area)); ?><?php echo (urlencode($u_language)); ?><?php echo ($u_letter); ?><?php echo ($u_order); ?><?php echo ($u_picm); ?>.html" data="year-0">全部</a></li>
<?php $out=0; foreach($s_year as $yid=>$yvalue){ if($_GET[year]==$yvalue) $class=" class='current'";else $class=NULL;echo "<li><a $class href='".$root.$vodlist."-".$list_id.$u_mcid.$u_lz.urlencode($u_area)."-year-".$yvalue.$u_language.$u_letter.$u_order.$u_picm.".html' data='year-".$yvalue."'>".$yvalue."</a></li>";if($out>12) break;else $out++;}?></ul> </div>
        <div class="clearfix">
        <h5>字母：</h5>
          <ul>
        <li><a <?php if (!isset($_GET['letter'])){ ?> class="current"<?php } ?> href="<?php echo ($root); ?>vod-type-id-<?php echo ($list_id); ?><?php echo ($u_mcid); ?><?php echo ($u_lz); ?><?php echo (urlencode($u_area)); ?><?php echo ($u_year); ?><?php echo (urlencode($u_language)); ?><?php echo ($u_order); ?><?php echo ($u_picm); ?>.html"   data="letter-0">全部</a></li>
          <?php foreach($s_letter as $yid=>$vvalue){ if($_GET[letter]==$vvalue) $class=" class='current'";else $class=NULL;echo "<li><a $class href='".$root.$vodlist."-".$list_id.$u_mcid.$u_lz.urlencode($u_area).$u_year.$u_language."-letter-".$vvalue.$u_order.$u_picm.".html' data='letter-".$vvalue."'>".$vvalue."</a></li>";} ?></ul>
    </div>
    <!-- // filter-item end -->
</div>
<script type="text/javascript">
window.onerror=function(){
	return true;
}
var windowurl='';
var windowuall='';
if(window.location.href.indexOf('show')>0){
  windowurl=window.location.href;
}
var parms='<?php echo $_GET[p]; ?>';
var pid='<?php echo ($list_pid); ?>';
$('.clearfix ul li a').click(function (e){
if($(this).attr('data').indexOf('mcid')==0){
$("#curlist").html("&raquo;"+$(this).html());
}
	var constr='';
	var curobj=$(this);
	if(parms!=undefined&&parms!=null)
     {
		var curdata=$(this).attr('data').split('-');
		parms[curdata[0]]=curdata[1];
		url=parseurl(parms);
		curobj.parent().siblings().children("a").removeClass('current');
		curobj.addClass('current');
	    pagegooo(url);
	   $('.clearfix ul li a').each(function(e){
	     if( $(this).attr('class')=='current')
		  {
	       if($(this).html() == '全部')
	       constr+=' ';
	       else
	     constr +='<em>'+$(this).html()+'</em>';
	     }
    	});//index  bread
	if(constr !='')
	$('.conbread').html(constr);
   }
return false;
});
function pagegooo(url){ 
url=url+".html";
   if(($('#contents li').length > 3)) $("html,body").animate({scrollTop:$("#contents").offset().top - 93},500);
	$("#contents").html('<li class="kong"><label>努力加载中……</label></li>');
	$.get(url, function(data,status) {
	 var value=jQuery('#contents', data).html();
      if(value=='') {
	  value=  '<li class="kong">抱歉，没有找到相关内容！</li>';
	  }  
	 $("#contents").html(value);
	 $("#short-page").html(jQuery('#short-page', data).html())
	 $("#long-page").html(jQuery('#long-page', data).html())
     $(".uipages a").click(function (e){
                        e.preventDefault();
                        var curdata=$(this).attr('data').split('-');
                        parms[curdata[0]]=curdata[1];
                        var url=parseurl(parms);
                        pagegooo(url);
                        return false;
                    });
	});
}
$(function(){
parms=eval("({'id':'<?php echo $list_id; ?>','mcid':'<?php echo $_GET[mcid]; ?>','lz':'<?php echo $_GET[lz]; ?>','area':'<?php echo $_GET[area]; ?>','year':'<?php echo $_GET[year]; ?>','letter':'<?php echo $_GET[letter]; ?>','order':'addtime','picm':'1','p':'1'})");
$('.conreset').click(function(e){
parms=eval("({'id':'<?php if(empty($list_pid)): ?><?php echo $list_id; ?><?php else: ?><?php echo $list_pid; ?><?php endif; ?>','order':'addtime','picm':'1','p':'1','mcid':'0','lz':'0','year':'0','area':'0','letter':'0'})");
var hrf =Root + 'index.php?s=vod-show-id-<?php if(empty($list_pid)): ?><?php echo ($list_id); ?><?php else: ?><?php echo ($list_pid); ?><?php endif; ?>-picm-1.html';
hrf = hrf.substring(0,hrf.indexOf(".html"));
pagegooo(hrf);
$(".uipages a").click(
	function (e){
	pagegooo($(this).attr('href'));
	return false;
	}
	);
   var constrf='';
    $('.clearfix ul li a').each(function(e){
        if($(this).html() != '全部' && $(this).attr('class')=='current' ){
            constrf +='<em>'+$(this).html()+'</em>';
        }
    });
if(constrf !=''){
        $('.conbread').html(constrf);
    }
    $('.clearfix ul li a').each(function(e){
	$(this).removeClass('current');
	 if($(this).html() == '全部'){
	  $(this).attr('class','current');
	  $('#curlist').html("全部");
	  $('.conbread').html('');
	   }
	});
	return false;
 });
});
function parseurl(rr){
  var url=Root + 'index.php?s=vod-show';
  for(var c in rr){
     if(rr[c]!='0'){
    url=url+"-"+c+"-"+rr[c];
	}
  }
  return url;
}
$(function(){
    $('.uipages a').click(function (e){
                e.preventDefault();
                $(this).addClass('curr');
                $(this).siblings().removeClass('curr');
                var curdata=$(this).attr('data').split('-');
                parms[curdata[0]]=curdata[1];
                var url=parseurl(parms);
                pagegooo(url);
            }
);
	    $('.view a').click(function (e){
                e.preventDefault();
                $(this).addClass('curr');
                $(this).siblings().removeClass('curr');
                var curdata=$(this).attr('data').split('-');
                parms[curdata[0]]=curdata[1];
                var url=parseurl(parms);
                pagegooo(url);
            }
);
	 $('.list_nav span a').click(function (e){
               e.preventDefault();
               var constr='';
               var curobj=$(this);
               var url = curobj.attr('href');
                curobj.parent().siblings().children("a").removeClass('currt');
                curobj.addClass('currt');
   var url='';
		if(parms!=undefined&&parms!=null){
			var curdata=$(this).attr('data').split('-');
			parms[curdata[0]]=curdata[1];
			if(curdata[1]=='1'){
				$("#contents").removeClass('list-mode');
				$("#contents").addClass('grid-mode');
			}else{
				$("#contents").addClass('list-mode');
				$("#contents").removeClass('grid-mode');
		}
		}
}
);
});
conbread();
function  conbread(){
	var atag = $('.clearfix ul li a');
	var constr="";
$.each(atag, function(i,val){      
       var data = val.data;
	   if(windowurl.indexOf(data)!=-1){
	   	     constr +='<em>'+val.innerHTML+'</em>';
			  $(this).attr('class','current');
	   }
  }); 
  $('.conbread').html(constr);
}
</script>
	<?php if($_GET[order])
    $s_order=$_GET[order]." DESC";
    else
    $s_order="addtime desc";  
$vod_list=ff_mysql_vod('mcid:'.$_GET['mcid'].';cid:'.$list_id.';year:'.$_GET[year].';lz:'.$_GET[lz].';letter:'.$_GET[letter].';area:'.$_GET[area].';language:'.$_GET[language].';limit:20;page:true;order:vod_'.$s_order.';');$page = $vod_list[0]['page'];$pagetop = $vod_list[0]['pagetop'];$pagetops = $vod_list[0]['pagetops'];$pagetopt = $vod_list[0]['pagetopt'];$pags = $vod_list[0]['pags']; ?>
<div class="list_nav">
<ul class="view view-mode">
<?php echo "<a href='".$root.$vodlist."-".$list_id.$u_mcid.$u_area.$u_year.$u_language.$u_letter; ?>-order-addtime.html' <?php if($_GET[order]=="addtime") echo "class='curr order'"; ?><?php if($_GET[order]=="") echo "class='curr order'"; ?> data="order-addtime">最近更新</a>
<?php echo "<a href='".$root.$vodlist."-".$list_id.$u_mcid.$u_area.$u_year.$u_language.$u_letter; ?>-order-hits.html' <?php if($_GET[order]=="hits") {echo "class='curr order'";}else{echo "class='order'";} ?> data="order-hits">最受欢迎</a>
<?php echo "<a href='".$root.$vodlist."-".$list_id.$u_mcid.$u_area.$u_year.$u_language.$u_letter; ?>-order-gold.html' <?php if($_GET[order]=="gold") {echo "class='curr order'";}else{echo "class='order'";} ?> data="order-gold">评分最高</a>
</ul>
<span><?php echo "<a href='".$root.$vodlist."-".$list_id.$u_mcid.$u_lz.urlencode($u_area).$u_year.$u_language.$u_letter.$u_order.$u_picm; ?>.html' <?php if($_GET[picm]=="1") echo "class='poster_btn currt'"; ?> <?php if($_GET[picm]=="2") echo "class='poster_btn'"; ?> <?php if($_GET[picm]=="") echo "class='poster_btn currt'"; ?> data="picm-1">海报模式</a></span>
<span><?php echo "<a href='".$root.$vodlist."-".$list_id.$u_mcid.$u_lz.urlencode($u_area).$u_year.$u_language.$u_letter.$u_order.$u_picm; ?>.html' <?php if($_GET[picm]=="2") {echo "class='list_btn currt'";}else{echo "class='list_btn'";} ?> data="picm-2">列表模式</a></span>
</div>
 <ul class="<?php if($_GET[picm]=="1") echo "grid-mode"; ?><?php if($_GET[picm]=="") echo "grid-mode"; ?><?php if($_GET[picm]=="2") echo "list-mode"; ?>"  id="contents">
 <?php if(($vod_list["0"]["count"])  !=  "0"): ?><?php if(is_array($vod_list)): $i = 0; $__LIST__ = $vod_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a class="vod-img" href="<?php echo ($ppvod["vod_readurl"]); ?>"title="<?php echo ($ppvod["list_name"]); ?><?php echo ($ppvod["vod_name"]); ?>"><img  class="loadimg"  src="<?php echo ($ppvod["vod_picurl"]); ?>" data-lazyload-type="auto"  /><label class="mask"></label><label class="text"><?php if($ppvod["vod_continu"] != 0): ?><?php echo ($ppvod["lastplay_name"]); ?><?php else: ?><?php echo ($ppvod["vod_title"]); ?><?php endif; ?></label><label class="score"><?php echo ($ppvod["vod_gold"]); ?></label><?php if($ppvod["vod_continu"] != 0): ?><?php if(!empty($ppvod["vod_tvcont"])): ?><span class="tv"></span><span class="tvtime"><?php echo ($ppvod["vod_diantai"]); ?><?php echo ($ppvod["vod_tvcont"]); ?></span><?php else: ?><?php endif; ?><?php else: ?><?php endif; ?>
   </a>
     <div class="play-txt">
      <h3><a target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a><span class="stitle"><?php echo ($ppvod["lastplay_name"]); ?></span></h3>
      <p class="gold"><span class="starbs"><span class="starbb" style="width:<?php echo($ppvod['vod_gold']*10) ?>%;"></span></span>(<?php echo ($ppvod["vod_golder"]); ?>人评分)</p>
      <p class="director"><em>导演:</em><?php echo (ff_search_url($ppvod["vod_director"])); ?></p>
      <p class="actor"><em>主演:</em><?php echo (ff_search_url($ppvod["vod_actor"])); ?></p>
      <p class="type"><em>类型：</em><?php echo (ff_mcat_url($ppvod["vod_mcid"],$list_id)); ?><em class="area">地区：<?php echo (ff_search_url($ppvod["vod_area"])); ?></em></p>
      <p class="type"><em class="showdata">上映：<?php echo ($ppvod["vod_year"]); ?></em><em class="long">更新时间：<?php echo (date('Y-m-d',$ppvod["vod_addtime"])); ?></em></p>
      <p class="plot"><em>剧情：</em><?php echo (msubstr($ppvod["vod_content"],0,150,'utf-8',true)); ?>…</p>
      <p class="more-desc"><a class="ak" target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>">在线观看</a><a class="as" target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>#juqing">影片详情</a><a class="av" target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>#comment">影评</a></p>
    </div>
  </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
          <?php else: ?>
       	 <ul>该分类暂无数据！</ul><?php endif; ?> 
 <div class="uipages ui-vpages" id="long-page"><?php echo ($page); ?></div>	
	<div class="l_guide" id="l_guide"  style="display:none;">
		<div class="bg"></div>
		<div class="pag_bar">
			<ul class="view fl">
				<span>排序：</span>
                <?php echo "<a href=".$root.$vodlist."-".$list_id.$u_mcid.$u_area.$u_year.$u_language.$u_letter; ?>-order-addtime.html <?php if($_GET[order]=="addtime") echo "class='curr order'"; ?><?php if($_GET[order]=="") echo "class='curr order'"; ?> data="order-addtime">最近更新</a><?php echo "<a href=".$root.$vodlist."-".$list_id.$u_mcid.$u_area.$u_year.$u_language.$u_letter; ?>-order-hits.html <?php if($_GET[order]=="hits") {echo "class='curr order'";}else{echo "class='order'";} ?> data="order-hits">最受欢迎</a><?php echo "<a href=".$root.$vodlist."-".$list_id.$u_mcid.$u_area.$u_year.$u_language.$u_letter; ?>-order-gold.html <?php if($_GET[order]=="gold") {echo "class='curr order'";}else{echo "class='order'";} ?> data="order-gold">评分最高</a><?php echo "<a href=".$root.$vodlist."-".$list_id.$u_mcid.$u_area.$u_year.$u_language.$u_letter; ?>-order-gold.html <?php if($_GET[order]=="id") {echo "class='curr order'";}else{echo "class='order'";} ?> data="order-id">最新上映</a></ul>
			<div class="toTop_w"><a class="toTop" title="回到顶部" href="javascript:;" onClick="window.scroll(0,0)"></a></div>
			<div class="uipages pagem" id="short-page"><?php echo ($pagetop); ?></div>
		</div>
	</div>
    <script>
	jQuery(function(){
		var obj=document.getElementById("l_guide");
        function getScrollTop(){
                return document.documentElement.scrollTop;
            }
        function setScrollTop(value){
                document.documentElement.scrollTop=value;
            }    
        window.onscroll=function(){
			getScrollTop()>610?obj.style.display="":obj.style.display="none";
		}
	})
</script>
       </div>
<div class="ad980"><?php echo getadsurl('top960');?></div>
            </div>
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
    </div>
  </div>
<script type="text/javascript" src="<?php echo ($tpl); ?>js/IE6Top.js"></script>
<div class="back-to-top" id="back-to-top"><a href="javascript:window.scrollTo(0, 0);" target="_self">Back to Top</a></div>
<script src="<?php echo ($tpl); ?>js/foot_js.js" type="text/javascript"></script>
</body>
</html>