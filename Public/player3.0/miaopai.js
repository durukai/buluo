/* Ckparse云解析插件【免费版】
 * 官方网站    www.ckparse.com
 * QQ群        577200423(1群) ，209071824(2群)
 * @version    3.0
 * @since      1.0
 */
function $Showhtml(){
	var ua = navigator.userAgent.toLowerCase();
	if(ua.match(/ipad/i)=="ipad" || ua.match(/iphone/i)=="iphone")
	{
		var player = ['<iframe width="100%" height="'+Player.Height+'" src="http://jxapi.nepian.com/ckparse/?url='+Player.Url+'" frameborder="0" border="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>'].join('');
	}
	else
	{
		player = '<iframe width="100%" height="'+Player.Height+'" src="http://jxapi.nepian.com/ckparse/?url='+Player.Url+'" frameborder="0" border="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>';
	}
	return player;
}
Player.Show();
if(Player.Second){
	$$('buffer').style.height = Player.Height-39;
	$$("buffer").style.display = "block";
	setTimeout("Player.BufferHide();",Player.Second*1000);
}
