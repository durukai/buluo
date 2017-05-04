var playArea=["series_tt8_con_1","series_tt7_con_1","series_tt3_con_1","series_tt2_con_1","series_tt9_con_1","series_tt6_con_1","series_tt5_con_1","series_tt4_con_1","series_tt10_con_1","series_tt_con_1"];

var dx_play=function(){
	var newhover=function(){
		var href=$(this).attr('href');
		if($(this).find('img').size()){
			/*
				$(this).find('img').each(function(){
					
					var x = $(this).offset().top;
					var y = $(this).offset().left;
					var w=$(this).width()/2+x;
					var h=$(this).height()/2+y;
					$("#play_button_img").css({"top":w+"px","left":h+"px"});
					$('#play_button_img').show();
					
					//alert(X);
					//info.txt=encodeURIComponent($(this).attr('title'));
				})
			*/
				$thisimg=$(this).find('img');
				var x = $thisimg.offset().top;
				var y = $thisimg.offset().left;
				var width=$thisimg.width();
				var height=$thisimg.height();
				var w=width/2-21;
				var h=height/2-21;
				$("#play_button_img ").css({"top":x+"px","left":y+"px","width":width+"px","height":height+"px"});
				$("#play_button_img a").css({"padding-left":0+"px","padding-top":0+"px","width":width+"px","height":height+"px"});
				$('#play_button_img').show();
				$('#play_button_img a').attr('href',href);
		}
	}
	var newout=function(){
		$('#play_button_img').hide();
	}

	this.inlitialize=function(){
		for(var i in playArea){$('#'+playArea[i]).find('a').each(function(){
				$(this).unbind('mouseover',newhover);
				$(this).bind('mouseover',newhover);
				$(this).bind('mouseout',newout);
		})}
	}
}
$(document).ready(function(){
	$('body').append('<div id="play_button_img"><a href="#" target="_blank"></a></div>');
	var dx_playObj=new dx_play();
	dx_playObj.inlitialize();	
	$("#play_button_img").mouseover(function(){ 
		$('#play_button_img').show();  
		});
	$("#play_button_img").mouseout(function(){ 
		$('#play_button_img').hide();  
		});

});