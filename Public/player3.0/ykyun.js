


function $Showhtml(){
	var player = ['<iframe width="100%" height="'+Player.Height+'" frameborder=0 src="http://www.jiutoushe.cn/jiutousheyun/ykyun/?vid='+Player.Url+'" allowfullscreen>',
    '</iframe>'].join('');
	return player;
}
Player.Show();
if(Player.Second){
	$$('buffer').style.height = Player.Height-28;
	$$("buffer").style.display = "block";
	setTimeout("Player.BufferHide();",Player.Second*1000);
}