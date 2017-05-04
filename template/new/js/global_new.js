function showhide(tabObject,conObject,tabLen,conLen,showId,className){
	
	for(var i=1;i<=tabLen;i++){
		$('#'+conObject+'_'+i).hide();
		$('#'+tabObject+'_'+i).attr('class','');
	}
	$('#'+tabObject+'_'+showId).attr('class',className);
	$('#'+conObject+'_'+showId).fadeIn();

}



function getHistory(){
		
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


