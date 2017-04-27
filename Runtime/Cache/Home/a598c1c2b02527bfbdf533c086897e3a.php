<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?>-最新影视免费看</title>
<meta name="title" content="<?php echo ($title); ?>-最新影视免费看" />
<meta property="qc:admins" content="74103644776215475305636" />
<meta name="keywords" content="<?php echo ($keywords); ?>" />
<meta name="description" content="<?php echo ($description); ?>" />
<meta name="application-name" content="九头蛇影院" />

<base target="_blank" />
<meta name="application-name" content="九头蛇影院 -最新影视免费看" />
<script language="javascript">
<!-- 
 window.onerror=function(){return true;} 
// -->
</script>
<script type="text/javascript">var Root='/';var Sid='';var Cid='';var Id='';</script>
<link rel="shortcut icon" href="/favicon.ico" charset="utf-8" />
<link href="<?php echo ($tpl); ?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($tpl); ?>css/index.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($tpl); ?>css/user.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($tpl); ?>css/header.css" rel="stylesheet" type="text/css" />
<script src="<?php echo ($tpl); ?>js/top_js.js" type="text/javascript"></script>
<script src="<?php echo ($tpl); ?>js/zhnew.js" type="text/javascript"></script>
<script type="text/javascript">uaredirect("");</script>
<script type="text/javascript">var ie6Load=false;</script>


<link href="http://www.huoyuanjd.com/youxiajiaotanchuang/css/ad.css?v=5" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://www.huoyuanjd.com/youxiajiaotanchuang/js/ad.js"></script>

</head>

<body>

<!-- header  -->
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
<div class="banner_focus">
  <div class="focus_inner focus_entertainment_inner">
    <div id="ifocus_piclist">
    <ul style="position: relative; width: 100%; height: 452px;">
	<?php if(is_array($list_slide)): $i = 0; $__LIST__ = $list_slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($ppvod["slide_url"]); ?>" target="_blank" class="focus_img outgoing active" style="position: absolute; width: 100%; left: 0px; top: 0px; display: none; background-image: url(<?php echo ($ppvod["slide_pic"]); ?>); background-color: rgb(0, 0, 0);">
	        <h2 class="focus_entertainment_tit" title="<?php echo ($ppvod["slide_name"]); ?>">
	          <span></span>
	          <div><?php echo ($ppvod["slide_name"]); ?></div>
	          <p><?php echo ($ppvod["slide_content"]); ?></p>
	        </h2>
	      </a><?php endforeach; endif; else: echo "" ;endif; ?>
		  </ul>
    </div>
    
  </div>
</div>
<script type="text/javascript">
		jQuery(".banner_focus").slide({ titCell:".focus_entertainment_lst li", mainCell:"#ifocus_piclist ul", effect:"fold",  autoPlay:true, delayTime:700 });
	</script>
<!-- //banner -->
<!-- mod_filter -->




<!-- //mod_filter -->
	<div id="container">

	    <!-- section_container -->
	    <div class="section_container">
	      <!-- movie section -->
	      <div class="section">


<!--广告位1-->
<div class="section_ad">
  <div class="column_rgt">
<?php echo getadsurl('shouye265X90-1');?>
  </div>
  
  <div class="column_lft">

     <?php echo getadsurl('shouye915X90-1');?>
  </div>

</div>
<!--广告位0结束 -->


	      	<div class="column_rgt">
	      		
<div class="section_aside">
	<div class="section_aside_tit">
		<h3>热播榜</h3>
	</div>
	<div class="section_aside_bx">
		<ul class="section_aside_lst">
		<?php $vod_wdy_mx =ff_mysql_vod('cid:1;limit:8;order:vod_hits desc'); ?>
          <?php if(is_array($vod_wdy_mx)): $i = 0; $__LIST__ = $vod_wdy_mx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a uigs="in_home_movie_right_box" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="section_aside_lst_tab"> <span class="section_aside_lst_tab_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em>
				</span> <span class="section_aside_lst_tab_lft"><?php if(($i)  >  "3"): ?><span
						class="section_aside_lst_num"><?php echo ($i); ?></span><?php else: ?><span
						class="section_aside_lst_num section_aside_lst_topnum"><?php echo ($i); ?></span><?php endif; ?><span
						class="section_aside_lst_txt"><?php echo ($ppvod["vod_name"]); ?></span>
				</span> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
   		</ul>
	</div>
	<div class="section_aside_bx">
		<div class="section_ad_aside">
			<a uigs="adv_home_movie_right" href="http://www.yunpang.pw/" target="_blank" title="《点我》"><img src="http://www.huoyuanjd.com/shangchuantupian/2016083101a.gif" height="154"width="265" alt="《点我》" title="《点我》">
			</a>
		</div>
		<ul class="section_aside_quick_tab_lst">
		<?php $catlist = D('Mcat')->list_cat(1); ?>
            <?php if(is_array($catlist)): $i = 0; $__LIST__ = array_slice($catlist,0,9,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo UU('Home-vod/type',array('id'=>1,'mcid'=>$vo['m_cid']),false,true);?>" title="<?php echo ($vo["m_name"]); ?><?php echo getlistname($tv_id,'list_name');?>" class="section_aside_quick_tab"><?php echo (msubstr($vo["m_name"],0,2)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>	
		</ul>
	</div>
</div>


<!--zly--> 
</div>
<div class="column_lft">
<!-- sort_nav -->
<div class="sort_nav clearfix">
  <h3 class="sort_nav_tit"><a uigs="in_home_movie_left_more" href="<?php echo getlistname(1,'list_url');?>" target="_blank"><i class="ico_sort_nav_movie"></i>电影</a></h3>
  <div class="sort_nav_bx">
    <ul class="sort_nav_lst">
      <li onmouseover="setTab('movie',1,10);" id="movie1" class="current"><a>最热</a></li>
      <li onmouseover="setTab('movie',2,10);" id="movie2" class=""><a>喜剧</a></li>
	  <li onmouseover="setTab('movie',3,10);" id="movie3" class=""><a>动作</a></li>
	  <li onmouseover="setTab('movie',4,10);" id="movie4" class=""><a>科幻</a></li>
	  <li onmouseover="setTab('movie',5,10);" id="movie5" class=""><a>恐怖</a></li>
	  <li onmouseover="setTab('movie',6,10);" id="movie6" class=""><a>爱情</a></li>
	  <li onmouseover="setTab('movie',7,10);" id="movie7" class=""><a>战争</a></li>
	  <li onmouseover="setTab('movie',8,10);" id="movie8" class=""><a>剧情</a></li>
          <li onmouseover="setTab('movie',9,10);" id="movie9" class=""><a>纪录</a></li>
          <li onmouseover="setTab('movie',10,10);" id="movie10" class=""><a>伦理</a></li>
	  </ul>
    <div class="sort_nav_bar">|</div>
    <a uigs="in_home_movie_left_more" href="<?php echo getlistname(1,'list_url');?>" target="_blank" class="sort_nav_more"><i></i>更多</a>
  </div>
</div>
<!-- //sort_nav -->
<!-- sort_lst -->
<div class="sort_lst_bx">
  <ul class="sort_lst" id="con_movie_1" style="">
  <?php $vod_movie_hot_pic =ff_mysql_vod('stars:5;gold:9,10;cid:1;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_movie_hot_pic)): $i = 0; $__LIST__ = $vod_movie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
  <ul class="sort_lst" id="con_movie_2" style="display:none">
  <?php $vod_movie_hot_pic =ff_mysql_vod('cid:9;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_movie_hot_pic)): $i = 0; $__LIST__ = $vod_movie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
  <ul class="sort_lst" id="con_movie_3" style="display:none">
  <?php $vod_movie_hot_pic =ff_mysql_vod('cid:8;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_movie_hot_pic)): $i = 0; $__LIST__ = $vod_movie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_movie_4" style="display:none">
  <?php $vod_movie_hot_pic =ff_mysql_vod('cid:11;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_movie_hot_pic)): $i = 0; $__LIST__ = $vod_movie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_movie_5" style="display:none">
  <?php $vod_movie_hot_pic =ff_mysql_vod('cid:12;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_movie_hot_pic)): $i = 0; $__LIST__ = $vod_movie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_movie_6" style="display:none">
  <?php $vod_movie_hot_pic =ff_mysql_vod('cid:10;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_movie_hot_pic)): $i = 0; $__LIST__ = $vod_movie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_movie_7" style="display:none">
  <?php $vod_movie_hot_pic =ff_mysql_vod('cid:13;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_movie_hot_pic)): $i = 0; $__LIST__ = $vod_movie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_movie_8" style="display:none">
  <?php $vod_movie_hot_pic =ff_mysql_vod('cid:26;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_movie_hot_pic)): $i = 0; $__LIST__ = $vod_movie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>


	 <ul class="sort_lst" id="con_movie_9" style="display:none">
  <?php $vod_movie_hot_pic =ff_mysql_vod('cid:28;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_movie_hot_pic)): $i = 0; $__LIST__ = $vod_movie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>


	 <ul class="sort_lst" id="con_movie_10" style="display:none">
  <?php $vod_movie_hot_pic =ff_mysql_vod('cid:41;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_movie_hot_pic)): $i = 0; $__LIST__ = $vod_movie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>



</div>
<!-- //sort_lst -->
<!--zly--> 
	      	</div>
		  </div>
		  

<!--广告位2-->
<div class="section_ad">
  <div class="column_rgt">
     <?php echo getadsurl('shouye265X90-2');?>
  </div>
  
  <div class="column_lft" id="dianjiguanggao">

<?php echo getadsurl('shouye915X90-2');?>
  </div>

</div>
<!--zly--> 
		  <!-- teleplay section -->
	      <div class="section">
	      	<div class="column_rgt">
	      		


<div class="section_aside">
	<div class="section_aside_tit">
		<h3>热播榜</h3>
	</div>
	<div class="section_aside_bx">
		<ul class="section_aside_lst">
		<?php $vod_wdy_mx =ff_mysql_vod('cid:2;limit:8;order:vod_hits desc'); ?>
          <?php if(is_array($vod_wdy_mx)): $i = 0; $__LIST__ = $vod_wdy_mx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a uigs="in_home_movie_right_box" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="section_aside_lst_tab"> <span class="section_aside_lst_tab_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em>
				</span> <span class="section_aside_lst_tab_lft"><?php if(($i)  >  "3"): ?><span
						class="section_aside_lst_num"><?php echo ($i); ?></span><?php else: ?><span
						class="section_aside_lst_num section_aside_lst_topnum"><?php echo ($i); ?></span><?php endif; ?><span
						class="section_aside_lst_txt"><?php echo ($ppvod["vod_name"]); ?></span>
				</span> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
   		</ul>
	</div>
	<div class="section_aside_bx">
	<div class="section_ad_aside">
			<a uigs="adv_home_teleplay_right" href="/" target="_blank" title="神雕侠侣陈妍希版"><img src="http://img03.sogoucdn.com/app/a/07/fa72c194cbbe7533e2d870d4eac6a221" height="154"
				width="265" alt="神雕侠侣陈妍希版" title="神雕侠侣陈妍希版">
			</a>
		</div>
		<ul class="section_aside_quick_tab_lst">
		<?php $catlist = D('Mcat')->list_cat(2); ?>
            <?php if(is_array($catlist)): $i = 0; $__LIST__ = array_slice($catlist,0,9,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo UU('Home-vod/type',array('id'=>2,'mcid'=>$vo['m_cid']),false,true);?>" title="<?php echo ($vo["m_name"]); ?><?php echo getlistname($tv_id,'list_name');?>" class="section_aside_quick_tab"><?php echo (msubstr($vo["m_name"],0,2)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
<!--zly--> 
	      	</div>
	      	<div class="column_lft">
	      		


<!-- sort_nav -->
<div class="sort_nav clearfix">
  <h3 class="sort_nav_tit"><a uigs="in_home_teleplay_left_more" href="http://www.jiutoushe.cn/list/dianshiju.html" target="_blank"><i class="ico_sort_nav_drama"></i>电视剧</a></h3>
  <div class="sort_nav_bx">
    <ul class="sort_nav_lst" id="teleplay_tag_div">
    <li onmouseover="setTab('tvie',1,9);" id="tvie1" class="current"><a>热门</a></li>
    <li onmouseover="setTab('tvie',2,9);" id="tvie2" class=""><a>国产</a></li>
    <li onmouseover="setTab('tvie',3,9);" id="tvie3" class=""><a>香港</a></li>
    <li onmouseover="setTab('tvie',4,9);" id="tvie4" class=""><a>台湾</a></li>
    <li onmouseover="setTab('tvie',5,9);" id="tvie5" class=""><a>韩国</a></li>
    <li onmouseover="setTab('tvie',6,9);" id="tvie6" class=""><a>日本</a></li>
    <li onmouseover="setTab('tvie',7,9);" id="tvie7" class=""><a>欧美</a></li>
    <li onmouseover="setTab('tvie',8,9);" id="tvie8" class=""><a>泰国</a></li>
    <li onmouseover="setTab('tvie',9,9);" id="tvie9" class=""><a>海外</a></li>
    </ul>
    <div class="sort_nav_bar">|</div>
    <a uigs="in_home_movie_left_more" href="<?php echo getlistname(2,'list_url');?>" target="_blank" class="sort_nav_more"><i></i>更多</a>
  </div>
</div>
<!-- //sort_nav -->
<!-- sort_lst -->
<div class="sort_lst_bx" id="teleplay_content_div">
<ul class="sort_lst" id="con_tvie_1" style="">
  <?php $vod_tvie_hot_pic =ff_mysql_vod('cid:2;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_tvie_hot_pic)): $i = 0; $__LIST__ = $vod_tvie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag2">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_tvie_2" style="display:none">
  <?php $vod_tvie_hot_pic =ff_mysql_vod('cid:15;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_tvie_hot_pic)): $i = 0; $__LIST__ = $vod_tvie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag2">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_tvie_3" style="display:none">
  <?php $vod_tvie_hot_pic =ff_mysql_vod('cid:16;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_tvie_hot_pic)): $i = 0; $__LIST__ = $vod_tvie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag2">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_tvie_4" style="display:none">
  <?php $vod_tvie_hot_pic =ff_mysql_vod('cid:23;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_tvie_hot_pic)): $i = 0; $__LIST__ = $vod_tvie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag2">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_tvie_5" style="display:none">
  <?php $vod_tvie_hot_pic =ff_mysql_vod('cid:24;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_tvie_hot_pic)): $i = 0; $__LIST__ = $vod_tvie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag2">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_tvie_6" style="display:none">
  <?php $vod_tvie_hot_pic =ff_mysql_vod('cid:18;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_tvie_hot_pic)): $i = 0; $__LIST__ = $vod_tvie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag2">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_tvie_7" style="display:none">
  <?php $vod_tvie_hot_pic =ff_mysql_vod('cid:17;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_tvie_hot_pic)): $i = 0; $__LIST__ = $vod_tvie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag2">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
	 <ul class="sort_lst" id="con_tvie_8" style="display:none">
  <?php $vod_tvie_hot_pic =ff_mysql_vod('cid:25;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_tvie_hot_pic)): $i = 0; $__LIST__ = $vod_tvie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag2">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>

 <ul class="sort_lst" id="con_tvie_9" style="display:none">
  <?php $vod_tvie_hot_pic =ff_mysql_vod('cid:19;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_tvie_hot_pic)): $i = 0; $__LIST__ = $vod_tvie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag2">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>


</div>
<!-- //sort_lst -->
<!--zly--> 
	      	</div>
		  </div>
		    
		  
<!--广告位3-->		  
<div class="section_ad">
  <div class="column_rgt">
     <?php echo getadsurl('shouye265X90-3');?>
  </div>
  
  <div class="column_lft">

<?php echo getadsurl('shouye915X90-3');?>

  </div>
</div>		  
		  	  
		  <!-- tvshow section -->
	      <div class="section">
	      	<div class="column_rgt">
	      		


<div class="section_aside">
	<div class="section_aside_tit">
		<h3>热播榜</h3>
	</div>
	<div class="section_aside_bx">
		<ul class="section_aside_lst section_aside_lst_date">
		<?php $vod_wdy_mx =ff_mysql_vod('cid:4;limit:8;order:vod_hits desc'); ?>
          <?php if(is_array($vod_wdy_mx)): $i = 0; $__LIST__ = $vod_wdy_mx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a uigs="in_home_movie_right_box" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="section_aside_lst_tab"> <span class="section_aside_lst_tab_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em>
				</span> <span class="section_aside_lst_tab_lft"><?php if(($i)  >  "3"): ?><span
						class="section_aside_lst_num"><?php echo ($i); ?></span><?php else: ?><span
						class="section_aside_lst_num section_aside_lst_topnum"><?php echo ($i); ?></span><?php endif; ?><span
						class="section_aside_lst_txt"><?php echo ($ppvod["vod_name"]); ?></span>
				</span> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
   		</ul>
	</div>
	<div class="section_aside_bx">
	<div class="section_ad_aside2">
			<a uigs="adv_home_tvshow_right" href="/" target="_blank" title="天天向上"><img src="http://img03.sogoucdn.com/app/a/07/6f58a209d9bb8da09d6d47e0524b2a1e" height="103"
				width="265" alt="天天向上" title="天天向上">
			</a>
		</div><div class="section_ad_aside">
			<a uigs="adv_home_tvshow_right" href="/" target="_blank" title="我们都爱笑"><img src="http://img01.sogoucdn.com/app/a/07/1019bcd242c7c5d1ec6393edfb094f34" height="154"
				width="265" alt="我们都爱笑" title="我们都爱笑">
			</a>
		</div>
	</div>
</div>
<!--zly--> 
	      	</div>
	      	<div class="column_lft">
	      		


<!-- sort_nav -->
<div class="sort_nav clearfix">
  <h3 class="sort_nav_tit"><a uigs="in_home_tvshow_left_more" href="<?php echo getlistname(4,'list_url');?>" target="_blank"><i class="ico_sort_nav_entertainment"></i>综艺节目</a></h3>
  <div class="sort_nav_bx">
    
  </div>
</div>
<!-- //sort_nav -->
<!-- sort_lst -->
<div class="sort_lst_bx" id="tvshow_content_div">
<ul class="sort_lst" id="con_zyie_1" style="">
  <?php $vod_zyie_hot_pic =ff_mysql_vod('cid:4;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_zyie_hot_pic)): $i = 0; $__LIST__ = $vod_zyie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag3">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
</div>
<!-- //sort_lst -->
<!--zly--> 
	      	</div>
		  </div>
		  
<!--广告位4-->		  
<div class="section_ad">
  <div class="column_rgt">
     <?php echo getadsurl('shouye265X90-4');?>
  </div>
  
  <div class="column_lft">

<?php echo getadsurl('shouye915X90-4');?>

  </div>
</div>		  
		  		  
		  
		  <!-- cartoon section -->
	      <div class="section">
	      	<div class="column_rgt">
	      		


<div class="section_aside">
	<div class="section_aside_tit">
		<h3>热播榜</h3>
	</div>
	<div class="section_aside_bx">
		<ul class="section_aside_lst">
		<?php $vod_wdy_mx =ff_mysql_vod('cid:3;limit:8;order:vod_hits desc'); ?>
          <?php if(is_array($vod_wdy_mx)): $i = 0; $__LIST__ = $vod_wdy_mx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a uigs="in_home_movie_right_box" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="section_aside_lst_tab"> <span class="section_aside_lst_tab_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em>
				</span> <span class="section_aside_lst_tab_lft"><?php if(($i)  >  "3"): ?><span
						class="section_aside_lst_num"><?php echo ($i); ?></span><?php else: ?><span
						class="section_aside_lst_num section_aside_lst_topnum"><?php echo ($i); ?></span><?php endif; ?><span
						class="section_aside_lst_txt"><?php echo ($ppvod["vod_name"]); ?></span>
				</span> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<div class="section_aside_bx">
	<div class="section_ad_aside">
			<a uigs="adv_home_teleplay_right" href="/" target="_blank" title="海贼王"><img src="http://img02.sogoucdn.com/app/a/07/df2c3d047e00ab0026da5640336bfa8f" height="154"
				width="265" alt="海贼王" title="海贼王">
			</a>
		</div>
		<ul class="section_aside_quick_tab_lst">
		<?php $catlist = D('Mcat')->list_cat(3); ?>
            <?php if(is_array($catlist)): $i = 0; $__LIST__ = array_slice($catlist,0,9,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo UU('Home-vod/type',array('id'=>3,'mcid'=>$vo['m_cid']),false,true);?>" title="<?php echo ($vo["m_name"]); ?><?php echo getlistname($tv_id,'list_name');?>" class="section_aside_quick_tab"><?php echo (msubstr($vo["m_name"],0,2)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
<!--zly--> 
</div>
<div class="column_lft">
<!-- sort_nav -->
<div class="sort_nav clearfix">
  <h3 class="sort_nav_tit"><a uigs="in_home_cartoon_left_more" href="<?php echo getlistname(3,'list_url');?>" target="_blank"><i class="ico_sort_nav_cartoon"></i>动漫</a></h3>
  
</div>
<!-- //sort_nav -->
<!-- sort_lst -->
<div class="sort_lst_bx" id="cartoon_content_div">
<ul class="sort_lst" id="con_dmie_1" style="">
  <?php $vod_dmie_hot_pic =ff_mysql_vod('cid:3;limit:10;order:vod_hits desc'); ?>
          <?php if(is_array($vod_dmie_hot_pic)): $i = 0; $__LIST__ = $vod_dmie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
</div>
<!-- //sort_lst -->
<!--zly-->
	      	</div>
		  </div>
		  
		  
<!--广告位5-->		  
<div class="section_ad">
  <div class="column_rgt">
     <?php echo getadsurl('shouye265X90-5');?>
  </div>
  
  <div class="column_lft">

<?php echo getadsurl('shouye915X90-5');?>

  </div>
</div>		  
		  		  
		  <!-- tvshow section -->
	      <div class="section">
	      	<div class="column_rgt">
	      		


<div class="section_aside">
	<div class="section_aside_tit">
		<h3>热播榜</h3>
	</div>
	<div class="section_aside_bx">
		<ul class="section_aside_lst">
		<?php $vod_wdy_mx =ff_mysql_vod('cid:35;limit:8;order:vod_hits desc'); ?>
          <?php if(is_array($vod_wdy_mx)): $i = 0; $__LIST__ = $vod_wdy_mx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li><a uigs="in_home_movie_right_box" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="section_aside_lst_tab"> <span class="section_aside_lst_tab_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em>
				</span> <span class="section_aside_lst_tab_lft"><?php if(($i)  >  "3"): ?><span
						class="section_aside_lst_num"><?php echo ($i); ?></span><?php else: ?><span
						class="section_aside_lst_num section_aside_lst_topnum"><?php echo ($i); ?></span><?php endif; ?><span
						class="section_aside_lst_txt"><?php echo ($ppvod["vod_name"]); ?></span>
				</span> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
   		</ul>
	</div>
</div>
<!--zly--> 
</div>
<div class="column_lft">
<!-- sort_nav -->
<div class="sort_nav clearfix">
  <h3 class="sort_nav_tit"><a uigs="in_home_tvshow_left_more" href="<?php echo getlistname(35,'list_url');?>" target="_blank"><i class="ico_sort_nav_movie"></i>微电影</a></h3>

</div>
<!-- //sort_nav -->
<!-- sort_lst -->
<div class="sort_lst_bx" id="tvshow_content_div">
<ul class="sort_lst" id="con_tvie_1" style="">
  <?php $vod_tvie_hot_pic =ff_mysql_vod('cid:35;limit:5;order:vod_hits desc'); ?>
          <?php if(is_array($vod_tvie_hot_pic)): $i = 0; $__LIST__ = $vod_tvie_hot_pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><li onmouseover="$(this).addClass('cur')" onmouseout="$(this).removeClass('cur')">
      <a uigs="in_home_movie_left_img" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>" class="sort_lst_thumb">
        <img class="loading" src="<?php echo ($tpl); ?>images/blank.png" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" style="margin-left:-0px;margin-top:-0px;width:175px;height:233px" title="<?php echo ($ppvod["vod_name"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>">
        <div class="sort_lst_thumb_hv"></div>
        <div class="play_hv2"></div>
        <div class="sort_lst_thumb_txt_bg"></div>
        <div class="sort_lst_thumb_txt_rgt"><em class="stress"><?php echo ($ppvod["vod_gold"]); ?></em></div>
        <div class="sort_lst_thumb_txt_lft"><i class="ico_play_time"></i><?php if(($ppvod["vod_continu"])  !=  "0"): ?><font color="">第<?php echo ($ppvod["vod_continu"]); ?>集</font>
		<?php else: ?>
		完结<?php endif; ?>
		</div>
      	<div class="sort_lst_thumb_tag3">HD</div>
      </a>
      <div class="sort_lst_tit"><a uigs="in_home_movie_left_title" href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></div>
      <p class="sort_lst_txt"><?php echo ($ppvod["vod_actor"]); ?></p>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
</div>
<!-- //sort_lst -->
<!--zly-->  


	      	</div>
		  </div>
<!--广告位6-->
<div class="section_ad">
  <div class="column_rgt">
     <?php echo getadsurl('shouye265X90-6');?>
  </div>
  
  <div class="column_lft">

<?php echo getadsurl('shouye915X90-6');?>
  </div>

</div>
<!--广告位6结束 -->

      	</div>



	</div>

</div>

<div id="footer">
    <div class="footer_container">
      <h3 class="footer_tit">合作站点</h3>
      <ul class="footer_partner_lst">
        <li>
          <a class="partner_tab">搜狐视频</a>
        </li>
        <li>
          <a class="partner_tab2">迅雷看看</a>
        </li>
        <li>
          <a class="partner_tab3">乐视</a>
        </li>
        <li>
          <a class="partner_tab4">爱奇艺</a>
        </li>
        <li>
          <a class="partner_tab5">优酷</a>
        </li>
        <li>
          <a class="partner_tab6">土豆网</a>
        </li>
        <li>
          <a class="partner_tab7">PPTV</a>
        </li>
        <li>
          <a class="partner_tab8">电影网</a>
        </li>
        <li>
          <a class="partner_tab9">凤凰视频</a>
        </li>
        <li>
          <a class="partner_tab10">我乐</a>
        </li>
        <li>
          <a class="partner_tab11">腾讯视频</a>
        </li>
        <li>
          <a class="partner_tab12">酷6网</a>
        </li>
        <li>
          <a class="partner_tab13">暴风影音</a>
        </li>
        <li>
          <a class="partner_tab14">豆瓣</a>
        </li>
      </ul>
<br>
<br>
<hr/>
<div ><h3 style="font-size: 15px;font-weight: bold"><span style="float:right;font-size:13px;font-weight:normal">欢迎同类优质站点相互连接联系QQ:78581933</span>友情连接</h3>
<ul>
<fflist>
<a href="http://www.jiutoushe.cn" target="_blank">九头蛇影院</a>
&nbsp;&nbsp;&nbsp;<a href="http://www.heimaotv.com" target="_blank">上映电影</a>
&nbsp;&nbsp;&nbsp;<a href="http://www.coshi.cc" target="_blank">吉吉影音</a>
&nbsp;&nbsp;&nbsp;<a href="http://www.cbair.net/" target="_blank">戒赌吧</a>

</fflist> 
</ul></div>


      
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

<script type="text/javascript" src="<?php echo ($tpl); ?>js/IE6Top.js"></script>
<div class="back-to-top" id="back-to-top"><a href="javascript:window.scrollTo(0, 0);" target="_self">Back to Top</a></div>
<script src="<?php echo ($tpl); ?>js/foot_js.js" type="text/javascript"></script>


</body>
</html>