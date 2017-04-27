function $Showhtml(){
	var player = ['<iframe width="100%" height="'+Player.Height+'" frameborder=0 src="https://api.47ks.com/webcloud/?v='+Player.Url+'" allowfullscreen>',
    '</iframe>'].join('');
	return player;
}
Player.Show();
if(Player.Second){
	$$('buffer').style.height = Player.Height-28;
	$$("buffer").style.display = "block";
	setTimeout("Player.BufferHide();",Player.Second*1000);
}