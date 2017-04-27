var jjvod_soft = '/Public/js/jjplayer_install.html';//安装页面
var jjvod_notice = '/Public/js/notice.html';//非IE提示页面

function $Showhtml(){
	var player;
	if(!!window.ActiveXObject || "ActiveXObject" in window){
		player = "<div style='position:relative;left:0;top:0'><div id='jjad' style='position:absolute; z-index:1001;top:0; left:0px; overflow:hidden;'><iframe marginWidth='0' id='wdqad' name='wdqad' marginHeight='0' src='"+Player.Buffer+"' frameBorder='0' width='690' scrolling='no' height='430'></iframe></div><object classid='clsid:C56A576C-CC4F-4414-8CB1-9AAC2F535837' width='690' height='"+Player.Height+"' id='jjhdPlayer' name='jjhdPlayer' onerror=\"document.getElementById('jjhdPlayer').style.display='none';document.getElementById('wdqad').src='"+jjhd_soft+"';\"><PARAM NAME='URL' VALUE='"+Player.Url+"'><param name='Autoplay' value='1'></object></div>";
		setInterval('jjvodstatus()','1000');
	}else{
		player = '<iframe src="'+jjhd_notice+'" frameborder="0" width="640" height="468" scrolling="no"></iframe>';
	}
	return player;
}
Player.Show();


//播放状态控制
function jjvodstatus(offest){
    if(document.getElementById('jjvodPlayer').PlayState==3){
         document.getElementById('jjad').style.display='none';
    }else if(document.getElementById('jjvodPlayer').PlayState==2||document.getElementById('jjvodPlayer').PlayState==4){
         document.getElementById('jjad').style.display='block';
    }
}