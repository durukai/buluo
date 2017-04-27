function $Showhtml(){
	player = '<embed type="application/x-shockwave-flash" src="http://static.video.qq.com/TencentPlayer.swf?vid='+Player.Url+'&auto=1&outhost=http://cf.qq.com/" id="movie_player" name="movie_player" type="application/x-shockwave-flash" menu="false" wmode="transparent" allowFullScreen="true" allowScriptAccess="never" allowNetworking="internal" pluginspage="http://www.macromedia.com/go/getflashplayer" width="100%" height="'+Player.Height+'">';
	return player;
}
Player.Show();
if(Player.Second){
	$$('buffer').style.height = Player.Height-30;
	$$("buffer").style.display = "block";
	setTimeout("Player.BufferHide();",Player.Second*1000);
}