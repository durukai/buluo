function $Showhtml(){
return '<iframe width="100%" height="'+Player.Height+'" src="/Public/player3.0/ckplayer.html" frameborder="0" border="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>';
}
Player.Show();
if(Player.Second){
$$('buffer').style.height = Player.Height-28;
$$("buffer").style.display = "block";
setTimeout("Player.BufferHide();",Player.Second*1000);
}