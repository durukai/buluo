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
<div class="wz"><span>您当前的位置：</span><a href="<?php echo ($root); ?>">首页</a> <a class="current">搜索页面</a></ul></div>
<div class="ad980"><?php echo getadsurl('list980');?></div>
<?php $vod_list = ff_mysql_vod('wd:'.$search_wd.';actor:'.$search_actor.';year:'.$search_year.';language:'.$search_language.';area:'.$search_area.';letter:'.$search_letter.';limit:8;page:true;order:vod_addtime desc');$page = $vod_list[0]['page']; ?>
<div class="all p_list">
<ul class="side_nav aleft" id="catecont">
<li class="first no_border"><span>分类检索</span></li>
<a class="curr" href="javascript:;" data="cid-0">全部</a>
    <?php $array_cid = array($mov_id,$tv_id,$dm_id,$zy_id,$wei_id); ?>
     <?php if(is_array($array_cid)): $i = 0; $__LIST__ = $array_cid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cid): ++$i;$mod = ($i % 2 )?><?php $list_vod = ff_mysql_vod('cid:'.$cid.';wd:'.$search_wd.';limit:1;order:vod_addtime desc'); ?>
     <?php if(empty($list_vod)): ?><?php else: ?><a href="javascript:;" data="cid-<?php echo ($cid); ?>"><?php echo getlistname($cid,'list_name');?></a><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="p_vodlist aright">
<div class="ui-title"><h4 class="wd aleft">搜索<strong style="color:#e12160;"><?php echo ($search_wd); ?></strong>共找到视频<strong style="color:red" id="counts"><?php echo ($pagecount); ?></strong>个</h4>
    </div>
<div class="list_nav">
<ul class="view-mode">
<a class='curr order' data="order-vod_addtime">最近更新</a>
<a class='order' data="order-vod_hits">最受欢迎</a>
<a class='order' data="order-vod_gold">评分最高</a>
</ul>
<span>
<a <?php if($_GET[t]=="2") {echo "class='poster_btn currt'";}else{echo "class='poster_btn'";} ?> data="t-1">海报模式</a></span>
<span>
<a <?php if($_GET[t]=="2") echo "class='list_btn currt'"; ?> <?php if($_GET[t]=="") echo "class='list_btn currt'"; ?> data="t-2">列表模式</a></span>
</div>
 <ul class="<?php if($_GET[t]=="1") echo "list-mode"; ?><?php if($_GET[t]=="") echo "list-mode"; ?><?php if($_GET[t]=="2") echo "grid-mode"; ?>"id="contents">
 <?php if(($vod_list["0"]["count"])  !=  "0"): ?><?php if(is_array($vod_list)): $i = 0; $__LIST__ = $vod_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a class="vod-img" href="<?php echo ($ppvod["vod_readurl"]); ?>"title="<?php echo ($ppvod["list_name"]); ?><?php echo ($ppvod["vod_name"]); ?>" ><img  class="loadimg" src="<?php echo ($ppvod["vod_picurl"]); ?>" data-lazyload-type="auto"/><label class="mask"></label><label class="text"><?php echo ($ppvod["lastplay_name"]); ?></label><label class="score"><?php echo ($ppvod["vod_gold"]); ?></label><?php if($ppvod["vod_continu"] != 0): ?><?php if(!empty($ppvod["vod_tvcont"])): ?><span class="tv"></span><span class="tvtime"><?php echo ($ppvod["vod_diantai"]); ?><?php echo ($ppvod["vod_tvcont"]); ?></span><?php else: ?><?php endif; ?><?php else: ?><?php endif; ?> </a>
     <div class="play-txt">
      <h3><a target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a><span class="stitle"><?php echo ($ppvod["lastplay_name"]); ?></span></h3>
      <p class="gold"><span class="starbs"><span class="starbb" style="width:<?php echo($ppvod['vod_gold']*10) ?>%;"></span></span>(<?php echo ($ppvod["vod_golder"]); ?>人评分)</p>
      <p class="director"><em>导演:</em><?php echo (ff_search_url($ppvod["vod_director"])); ?></p>
      <p class="actor"><em>主演:</em><?php echo (ff_search_url($ppvod["vod_actor"])); ?></p>
      <p class="type"><em>类型：</em><?php echo (ff_mcat_url_new($ppvod["vod_mcid"],$ppvod['vod_cid'])); ?><em class="area">地区：<?php echo (ff_search_url($ppvod["vod_area"])); ?></em></p>
      <p class="type"><em class="showdata">上映：<?php echo ($ppvod["vod_year"]); ?></em><em class="long">更新时间：<?php echo (date('Y-m-d',$ppvod["vod_addtime"])); ?></em></p>
      <p class="plot"><em>剧情：</em><?php echo (msubstr($ppvod["vod_content"],0,100,'utf-8',true)); ?>…</p>
      <p class="more-desc"><a class="ak" target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>">在线观看</a><a class="as" target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>#juqing">影片详情</a><a class="av" target="_blank" href="<?php echo ($ppvod["vod_readurl"]); ?>#comment">影评</a></p>
    </div>
  </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
          <?php else: ?>
       	 <ul>该分类暂无数据！</ul><?php endif; ?> 
 <div class="uipages ui-vpages" id="long-page"><?php echo ($page); ?></div>	
       </div>
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
<script type="text/javascript">
    var parms = new Array();
    function parseurl(rr){
        var url='<?php echo ($root); ?>index.php?s=vod-search-wd-<?php echo (urlencode($search_wd)); ?><?php echo (urlencode($search_director)); ?>-actor-<?php echo (urlencode($search_actor)); ?>';
        for(var c in rr){
            if(rr[c]!='0'){
                url=url+"-"+c+"-"+rr[c];
            }
        }
        return url;
    }
    function pagegoo(url){
        $("#contents").html('<li class="kong"><label>数据载入中.....</label>');
        $.ajax({
            url:url,
            success:function (r){
                if(r.data.ajaxtxt==''){
                    $("#contents").html('<li class="kong">没有搜索到您想要的结果，请尝试简化您的搜索关键词;或者到留言区求片等待小编为您添加！</li>');
                }else{
                    $("#contents").html(r.data.ajaxtxt);
                }
                $("#long-page").html(r.data.long_page);
                $("#short-page").html(r.data.short_page);
                $("#counts").html(r.data.count);
                $(".uipages a").click(function (e){
                    e.preventDefault();
                    var curdata=$(this).attr('data').split('-');
                    parms[curdata[0]]=curdata[1];
                    var url=parseurl(parms);
                    pagegoo(url);
                });
            },dataType:'json',error:function(){
                $("#contents").html('<br />服务器繁忙，请再试试...');
            }
        });
    }
    $('.view-mode a').click(function (e){
                e.preventDefault();
                $(this).addClass('curr');
                $(this).siblings().removeClass('curr');
                var curdata=$(this).attr('data').split('-');
                parms[curdata[0]]=curdata[1];
                var url=parseurl(parms);
                pagegoo(url);
            }
    );
    $(".uipages a").click(function (e){
        e.preventDefault();
        var curdata=$(this).attr('data').split('-');
        parms[curdata[0]]=curdata[1];
        var url=parseurl(parms);
        pagegoo(url);
        return false;
    });
    $("#catecont a").click(function (e){
        $(this).addClass('curr');
        $(this).siblings().removeClass('curr');
        var curdata=$(this).attr('data').split('-');
        parms[curdata[0]]=curdata[1];
        parms['p'] = 1;
        var url=parseurl(parms);
        pagegoo(url);
    });
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
});
</script>
</body>
</html>