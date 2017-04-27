﻿<?php
$config = require './Runtime/Conf/config.php';
$array = array(
	'USER_AUTH_KEY'=>'ffvod',// 用户认证SESSION标记
	'NOT_AUTH_ACTION'=>'index,show,add,top,left,main',// 默认无需认证操作
	'REQUIRE_AUTH_MODULE'=>'Admin,List,Vod,News,User,Collect,Data,Upload,Link,Ads,Cache,Create,Tpl,Cm,Gb,Tag,Special,Nav,Side,Pic',// 默认需要认证模型
    'URL_PATHINFO_DEPR'=>'-',
	'APP_GROUP_LIST'=>'Admin,Home,Plus,User',//项目分组
	'TMPL_FILE_DEPR'=>'_',//模板文件MODULE_NAME与ACTION_NAME之间的分割符，只对项目分组部署有效
	'LANG_SWITCH_ON'=>true,// 多语言包功能
	'LANG_AUTO_DETECT'=>false,//是否自动侦测浏览器语言
	'URL_CASE_INSENSITIVE'=>true,//URL是否不区分大小写 默认区分大小写
    'DB_FIELDTYPE_CHECK'=>true, //是否进行字段类型检查
	'DATA_CACHE_SUBDIR'=>true,//哈希子目录动态缓存的方式
    'TMPL_ACTION_ERROR'     => './Public/jump/jumpurl.html', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   => './Public/jump/jumpurl.html', // 默认成功跳转对应的模板文件		
	'DATA_PATH_LEVEL'=>2,
  	'url_model' => '3',
	'play_player' =>array (
	    'ffhd'=>    array('01','非凡影音'),
	    'xigua'=>    array('02','西瓜影音'),
		'xfplay'=>    array('03','影音先锋'),
		'jjvod'=>    array('04','吉吉影音'),
	    'xunlei'=>    array('05','迅雷影音'),
		'ykyun'=>    array('06','优酷云'),
		'tdyun'=>    array('07','土豆云'),
		'yuku'=>   array('08','优酷视频'),
		'qiyi'=>    array('09','奇艺视频'),
		'letv'=>    array('10','乐视视频'),
		'tudou'=>   array('11','土豆视频'),
		'sohu'=>    array('12','搜狐视频'),
		'qq'=>      array('13','腾讯视频'),
		'mgtv'=>    array('14','芒果TV'),
		'm1905'=>   array('15','M1905'),
		'cntv'=>    array('16','cntv高清'),
		'pps'=>     array('17','PPS视频'),
		'wole'=>    array('18','56视频'),
		'joy'=>     array('19','激动视频'),
		'room'=>    array('20','六间房'),
		'pptv'=>    array('21','PPTV视频'),
		'ku6'=>     array('22','酷六视频'),
		'down'=>    array('23','影片下载'),
		'swf'=>     array('24','Swf动画'),
		'flv'=>     array('25','Flv视频'),
		'web9'=>    array('26','久久影音'),
		'pvod'=>    array('27','皮皮高清'),
		'cool'=>    array('28','酷播高清'),
		'gvod'=>    array('29','迅播高清'),
		'funshion'=>array('30','风行影音'),
		'baofeng'=> array('31','暴风影音'),
		'pplive'=>  array('32','PPTV直播'),
		'sinahd'=>  array('13','新浪视频'),
		'media'=>   array('34','Media Player'),
		'real'=>    array('35','Real Player'),
		'ckplayer'=>array('36','超酷播放'),
		'yinyuetai'=>array('37','音悦台'),
	),
	//'APP_DEBUG'           =>true,    // 是否开启调试模式
    //'SHOW_RUN_TIME'		=> true,   // 运行时间显示
    //'SHOW_ADV_TIME'		=> true,   // 显示详细的运行时间
    //'SHOW_DB_TIMES'		=> true,   // 显示数据库查询和写入次数	
);
return array_merge($config,$array);
?>