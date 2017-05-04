function SetCookie(name, value) {
	var expdate = new Date();
	var argv = SetCookie.arguments;
	
	var argc = SetCookie.arguments.length;
	var expires = (argc > 2) ? argv[2] : null;
	var path = (argc > 3) ? argv[3] : null;
	var domain = (argc > 4) ? argv[4] : null;
	var secure = (argc > 5) ? argv[5] : false;
	if (expires != null) expdate.setTime(expdate.getTime() + (expires * 1000));
	document.cookie = name + "=" + encodeURI(value) + ((expires == null) ? "": ("; expires=" + expdate.toGMTString())) + ((path == null) ? ("; path=/") : ("; path=" + path)) + ((domain == null) ? "": ("; domain=" + domain)) + ((secure == true) ? "; secure": "");
};
function GetCookie(name) {
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;
	while (i < clen) {
		var j = i + alen;
		if (document.cookie.substring(i, j) == arg) return GetCookieVal(j);
		i = document.cookie.indexOf(" ", i) + 1;
		if (i == 0) break;
	};
	return null;
};
function GetCookieVal(offset) {
	var endstr = document.cookie.indexOf(";", offset);
	if (endstr == -1) endstr = document.cookie.length;
	return decodeURI(document.cookie.substring(offset, endstr));
};


function checkLogin(){
	var urlddd=window.location.href;
	var checkLoginUrl="/movie.php?action=series&method=checkLogin&round="+Math.random();
	$.ajax({url:checkLoginUrl,success:function(data){
        if(data.status!=0){
        	uInfo.uid = data.uid;
        	uInfo.username = data.username;
		   var name = data.username;
				var html='<span class="orange">'+name+'</span><a style="cursor:pointer" onclick="logout()" rel="nofollow">退出</a>';			
				$("#head_right").html(html)
			}else{
				var html='<a style="cursor:pointer" onclick="loadIframe();" rel="nofollow">登录</a><a href="http://login.dianxin.com/api.php?m=UCenter&a=userRegisterFromDX&service='+urlddd+'" target="_blank" rel="nofollow">注册</a>';
				$("#head_right").html(html);
			}
      },dataType:'json'});
}

function logout(){
	uInfo.uid = 0;
	uInfo.username = '';
	var urlddd=window.location.href;
	var html='<a style="cursor:pointer" onclick="loadIframe();" rel="nofollow">登录</a><a href="http://login.dianxin.com/api.php?m=UCenter&a=userRegisterFromDX&service='+urlddd+'" target="_blank" rel="nofollow">注册</a>';
	var logoutUrl='/movie.php?action=series&method=logout';	
	$.post(logoutUrl,function(data){
		var data=eval("("+data+")");
		$("#head_right").html(html);
		$("#login_js").html(data);
	});
}

   function insertKeywords(){
		var url="/movie.php?action=movie=method=insertKeywords";
		var key=$("#keywords").val();	
		$.post(url,{key:key},function(result){});
	}	

function openUrl(url,width,height){
	window.open(url,"miniBind",["toolbar=0,status=0,resizable=1,width=",width,",height=",height,",innerWidth=",width,",innerHeight=",height,",left=",(screen.width-width)/2,",top=",(screen.height-height)/2].join(""));
	}
function loadIframe(){
	var urlddd=window.location.href;
//	openUrl("http://login.dianxin.com/api.php?m=UCenter&a=userLoginFrame&service="+urlddd,980,630);
//	return;
	
	window.open('http://login.dianxin.com/api.php?m=UCenter&a=userLoginFromDX&service='+urlddd,'_self');
	return;
	$('#login_box_dx').show();
	$('#username').focus();
	var src=$('#loginIframe').attr("src");
    if(src==''){
    	$('#loginIframe').attr("src","http://login.dianxin.com/api.php?m=UCenter&a=userLoginFrame&service="+urlddd);
    }
}

function showhide(tabObject,conObject,tabLen,conLen,showId,className){
	
	for(var i=1;i<=tabLen;i++){
		$('#'+conObject+'_'+i).hide();
		$('#'+tabObject+'_'+i).attr('class','');
	}
	$('#'+tabObject+'_'+showId).attr('class',className);
	$('#'+conObject+'_'+showId).fadeIn();

}



function getHistory(){
   var recHtml='<dt>点心为您推荐：</dt>';	
		var url='/movie.php?action=movie&method=getUseMvCookie&his=1';
		var html='<dt>电影/电视剧：</dt>';
		var strCookie=document.cookie;
		var arrCookie=strCookie.split(";");
		var flag=0;
		for(var i=0;i<arrCookie.length;i++){
		var arr=arrCookie[i].split("=");
		if(arr[0].indexOf("useMvLog")>-1 || arr[0].indexOf("useMsLog")>-1){
			flag=1;
		}
		}
		if(flag==1){
			$("#historyEmpty").css({"height":"0px","padding":"0","display":"none"});
			$("#historyEmpty").html("");
		}else{
			$("#movieHistory").css({"height":"0px","padding":"0","display":"none"});
			$("#movieHistory").html("");
			html="";
		}
		$.getJSON(url,function(data){
			if(data!= null && data!=""){
			var len=data.length;
			for(var i=0;i<len;i++){
				html=html+'<dd><a href="/dianying/mv_show_'+data[i].m_id+'.html" style="text-align:left;" target="_blank">'+data[i].m_name+'</a></dd>';
			}	
			}
			$("#movieHistory").html(html);
		});
		
		var url='/movie.php?action=movie&method=getUseMsCookie&his=1';
		$.getJSON(url,function(data){
			if(data!= null && data!=""){
				var len=data.length;			
				for(var i=0;i<len;i++){
					html=html+'<dd><a href="/dianshiju/mv_show_'+data[i].s_id+'.html" style="text-align:left;" target="_blank">'+data[i].s_name+'</a></dd>';
				}
			}
			$("#movieHistory").html(html);
		});

		var url='/movie.php?action=movie&method=getSgSeriesList';
		$.getJSON(url,function(data){
			var len=data.length;
			for(var i=0;i<len;i++){
				recHtml=recHtml+'<dd><a target="_blank" style="text-align:left;" href="'+data[i].url+'">'+data[i].name+'</a></dd>';
			}
			$("#recHistory").html(recHtml);
		});		

}


function history(){
		var className=$("#historyButt").attr('class');
		$("#historyList").slideToggle(50,function(){
			var close=function(){
				$("#historyList").slideUp(50);
				$("#historyButt").attr('class','down_butt');
				$(document).unbind('click',close);};
			if($('#historyList').css('display')!='block'){				
			}else{
				$(document).bind('click',close);
			}	
			if(className=="down_butt"){
				$("#historyButt").attr('class','down_butt down_butt_01');
			}else{
				$("#historyButt").attr('class','down_butt');		
			}
		});
	}

function closeLoginBox(){
$('#login_box_dx').hide();
}


function getKeyword(){
	var url='/movie.php?action=series&method=getKeyword&rand='+Math.random();
	var html='';

		$.ajax({url:url,success:function(datas){
		if(datas!= null && datas!=""){
		var len=datas.length;
		for(var i=0;i<len;i++){
			html=html+'<a href="/movie.php?action=movie&keywords='+datas[i].name+'&method=mSearch" target="_blank">'+datas[i].name+'</a>';
			}	
		}
		$("#search_key_word").html(html);
		return;
      },dataType:'json'});

}
var userInfo = function(){
	this.uid = 0;
	this.username = '';
}
var uInfo = new userInfo();
$(document).ready(function(){
	$('body').append('<script src="/data/js/jquery-ui-1.8.21.custom.js"><\/script><div class="up_float_box" id="login_box_dx" style="display:none;top:60px"><div class="pop-up" style="width:980px;height:630px;"><div class="cont_02 cont_02_01" style="height:630px;"><div class="head_26" style="cursor:move;"><h1>登录点心</h1><a href="javascript:;" class="close" onclick="closeLoginBox();"></a></div><div class="tishi_jifen" style="padding-bottom:0px;display:none;" id="tishi_jifen"><i class="small_ico_02"></i><span>您尚未登陆点心，去淘宝网购物无法拿到最高<font class="red">50%</font>的返现金额！</span><a id="tishi_jifen_url" href="#" class="blue" target="_blank">不拿返利，去看看>></a></div><iframe  id="loginIframe" width="980px" height="630px" scrolling="no" frameborder="0" src=""></iframe></div></div></div>');
	
	$( "#login_box_dx" ).draggable({handle:".head_26",cancel:".close"});
	checkLogin();
	getKeyword();
	getHistory();
});

var dxChannelId=838383;
var explorer = window.navigator.userAgent;
if(explorer.indexOf("Chrome") >= 0){
document.domain="dianxin.com";
}else{
document.domain="dianxin.com";
}
