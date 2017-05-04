function movie(){
	this.left=function(type){
		switch(type){
		case 'top':
			var topMoviesObj	=	$("#topMovie li");
			var length			=	topMoviesObj.length;
			for(var i=0;i<length;i++){
				if(topMoviesObj[i].style.display=="block"){
					if(i-1<0){
						break;
					}else{
						topMoviesObj[i-1].style.display="block";
						break;
						}
					}
				}
			break;
		case 'concern':
			var concernMoviesObj	=	$("#concernMovie li");
			var length				=	concernMoviesObj.length;
			for(var i=0;i<length;i=i+3){
				if(concernMoviesObj[i].style.display=="block"){
					if(i-3<0){
						break;
					}else{
						var concernBlackObj=$("#concernBlack li i");
						switch(i){
						case 6:
							var currentBlack=1;
							$("#left_butt").css('background-position','left -46px');
							$("#right_butt").css('background-position','-48px -46px');						
							break;
						case 3:
							var currentBlack=0;
							$("#left_butt").css('background-position','-32px -46px');
							$("#right_butt").css('background-position','-48px -46px');
							break;
						}
						for(var j=0;j<3;j++){
							if(j==currentBlack){
								concernBlackObj[j].className="down";
							}else{
								concernBlackObj[j].className="";
							}
						}
						concernMoviesObj[i-1].style.display="block";
						concernMoviesObj[i-2].style.display="block";
						concernMoviesObj[i-3].style.display="block";
						break;
						}
					}
				}
			break;
			}
		}
	
	
	this.right=function(type){
		switch(type){
		case 'top':
			var topMoviesObj	=	$("#topMovie li");
			var length			=	topMoviesObj.length;			
			for(var i=0;i<length;i++){
				if(topMoviesObj[i].style.display=="block"){
					if(i+4==length-1){
						break;
					}else{
						topMoviesObj[i].style.display="none";
						break;
						}
					}
				}
			break;
		case 'concern':
			var concernMoviesObj	=	$("#concernMovie li");
			var length				=	concernMoviesObj.length;
			for(var i=0;i<length;i=i+3){
				if(concernMoviesObj[i].style.display=="block"){
					if(i+3==length){
						break;
					}else{
						var concernBlackObj=$("#concernBlack li i");
						switch(i){
						case 0:
							var currentBlack=1;
							$("#left_butt").css('background-position','left -46px');
							$("#right_butt").css('background-position','-48px -46px');
							break;
						case 3:
							var currentBlack=2;
							$("#left_butt").css('background-position','left -46px');
							$("#right_butt").css('background-position','-16px -46px');
							break;
						}
						for(var j=0;j<3;j++){
							if(j==currentBlack){
								concernBlackObj[j].className="down";
							}else{
								concernBlackObj[j].className="";
							}
						}
						concernMoviesObj[i].style.display="none";
						concernMoviesObj[i+1].style.display="none";
						concernMoviesObj[i+2].style.display="none";
						break;
						}
					}
				}
			}
		}
	this.changeGroup=function(){
		var movieClassicListObj		=	$("#movieClassicList li");
		var length					=	movieClassicListObj.length;
		for(var i=0;i<length;i=i+6){
			if(movieClassicListObj[i].style.display=="block"){
				if(i+6==length){
					for(var j=0;j<=5;j++){
						$("#movieClassicList li").eq(j).fadeIn(800);
						//movieClassicListObj[j].style.display="block";
					}
					break;
				}else{
					for(var j=i;j<=i+5;j++){
						$("#movieClassicList li").eq(j).fadeOut(500);
						//movieClassicListObj[j].style.display="none";	
					}
					break;
				}
			}
		}
	}
	this.getHistory=function(){
		
	    var recHtml='<dt>点心为您推荐：</dt>';	
		var url='/movielist.php?method=getUseMvCookie&his=1';
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
		
		var url='/movielist.php?method=getUseMsCookie&his=1';
		$.getJSON(url,function(data){
			if(data!= null && data!=""){
				var len=data.length;			
				for(var i=0;i<len;i++){
					html=html+'<dd><a href="/dianshiju/mv_show_'+data[i].s_id+'.html" style="text-align:left;" target="_blank">'+data[i].s_name+'</a></dd>';
				}
			}
			$("#movieHistory").html(html);
		});

		var url='/movielist.php?method=getSgSeriesList';
		$.getJSON(url,function(data){
			var len=data.length;
			for(var i=0;i<len;i++){
				recHtml=recHtml+'<dd><a target="_blank" style="text-align:left;" href="'+data[i].url+'">'+data[i].name+'</a></dd>';
			}
			$("#recHistory").html(recHtml);
		});		
	}
	this.getHotSearch=function(){
		var url='/movielist.php?method=getHotSearch';
		$.getJSON(url,function(data){
			var html='<span>热门搜索:</span>';
			var len=data.length;
			for(var i=0;i<len;i++){
				var html=html+'<a href="/movieList.php?method=mSearch&keywords='+data[i].s_content+'" target="_blank">'+data[i].s_content+'</a>';
			}
			$("#hotSearch").html(html);
		});
	}
}
function showhideD(id,idName,idChoose,className){
	var clickObj=	$('#'+idChoose+' li a');
	var listObj	=	$('#'+idName+' ul')
	if(idName=="topPlayList"){
		var clickObj=	$('#'+idChoose+' a');
		var listObj	=	$('#'+idName+' div')
	}
	for(var i=0;i<listObj.length;i++){
		if(i==id){
			listObj[i].animate({left:"200px"},"slow");
			//listObj[i].style.display="block";
			clickObj[i].className=className;//topPlayList&topPlayChoose两者个数不相等
		}else{
			listObj[i].animate({left:"200px"},"slow");
			//listObj[i].style.display="none";
			clickObj[i].className="";//topPlayList&topPlayChoose两者个数不相等
		}
	}
}
function showhideE(id,idName,idChoose,className){
	var clickObj=	$('#'+idChoose+' li a');
	var listObj	=	$('#'+idName+' ul')
	for(var i=0;i<clickObj.length;i++){
		if(clickObj[i].id=="choose"+id){
			clickObj[i].className=className;
		}else{
			clickObj[i].className="";
		}
	}
	for(var i=0;i<listObj.length;i++){
		if(listObj[i].id=="list"+id){
			listObj[i].style.display="block";
		}else{
			listObj[i].style.display="none";
		}
	}
	if(GetCookie('Uname')){
		var u_id=GetCookie('Uid');
		switch(id){
		case 'oumei':
			id=0;
			break;
		case 'xianggang':
			id=1;
			break;
		case 'rihan':
			id=2;
			break;
		case 'dalu':
			id=3;
			break;
		}
		var url="/movielist.php?method=dpClickHistory&u_id="+u_id+"&id="+id;
		$.get(url,function(data){});
	}else{
		var cookie=parseInt(GetCookie(id),10);
		SetCookie(id,cookie+1);
		//alert(cookie)
	}
}
function showhide(id,show,hide){
	if(show=="" && hide==""){
		var reClickObj			=	$('#artistRecommendChoose li a');
		var artistRecommendObj	=	$("#artistRecommendDiv .content_01")
		for(var i=0;i<reClickObj.length;i++){
			if(i==id){
				artistRecommendObj[i].style.display="block";
				if(i==0){
					reClickObj[i].className="fir down";
				}else{
					reClickObj[i].className="down";
				}
			}else{
				artistRecommendObj[i].style.display="none";
				reClickObj[i].className="";
			}
		}		
	}else{
		$("#"+show).show();
		$("#"+hide).hide();
		var reClickObj=$('#reClick li a');
		for(var i=0;i<2;i++){
			if(i==id){
				reClickObj[i].className="fir down";
			}else{
				reClickObj[i].className="";
			}
		}
	}
}

function setClickCookie(){
	if(!GetCookie('oumei')){
		SetCookie('oumei',0);
	}
	if(!GetCookie('xianggang')){
		SetCookie('xianggang',0);
	}
	if(!GetCookie('rihan')){
		SetCookie('rihan',0);
	}
	if(!GetCookie('dalu')){
		SetCookie('dalu',0);
	}
}
function changeClickHistory(){
	var clickJSON=[{'id':parseInt(GetCookie('oumei'),10),'d_id':'欧美','d_id_py':'oumei'},{'id':parseInt(GetCookie('xianggang'),10),'d_id':'香港','d_id_py':'xianggang'},{'id':parseInt(GetCookie('rihan'),10),'d_id':'日韩','d_id_py':'rihan'},{'id':parseInt(GetCookie('dalu'),10),'d_id':'大陆','d_id_py':'dalu'}];
	clickJSON.sort(function(a,b){return a["id"]<b["id"]?1:a["id"]==b["id"]?0:-1});
	var chooseHtml="";
	var dpListObj=$("#daPianList ul");
	for(var i=0;i<clickJSON.length;i++){
		if(i==0){
    		for(var j=0;j<dpListObj.length;j++){
    			if(dpListObj[j].id=="list"+clickJSON[i].d_id_py){
    				dpListObj[j].style.display="block";
    			}else{
    				dpListObj[j].style.display="none";
    			}
    		}
    		chooseHtml=chooseHtml+'<li><a style="cursor:pointer" id="choose'+clickJSON[i].d_id_py+'" onclick="showhideE(\''+clickJSON[i].d_id_py+'\',\'daPianList\',\'daPianChoose\',\'fir down\')" class="fir down">'+clickJSON[i].d_id+'</a></li>';
		}else{
			chooseHtml=chooseHtml+'<li><a style="cursor:pointer" id="choose'+clickJSON[i].d_id_py+'" onclick="showhideE(\''+clickJSON[i].d_id_py+'\',\'daPianList\',\'daPianChoose\',\'down\')" class="">'+clickJSON[i].d_id+'</a></li>';
		}
	}
	$("#daPianChoose").html(chooseHtml);
}
function getClickHistory(){
	url='/movielist.php?method=getdpClickHistoryInsert';
	$.getJSON(url,function(dpClickHistory){
	    	if(dpClickHistory!=""){
		    var chooseHtml="";
		    var dpListObj=$("#daPianList ul");
		    for(var i=0;i<dpClickHistory.length;i++){
		    	if(i==0){
		    		for(var j=0;j<dpListObj.length;j++){
		    			if(dpListObj[j].id=="list"+dpClickHistory[i].d_id_py){
		    				dpListObj[j].style.display="block";
		    			}else{
		    				dpListObj[j].style.display="none";
		    			}
		    		}
		    		chooseHtml=chooseHtml+'<li><a style="cursor:pointer" id="choose'+dpClickHistory[i].d_id_py+'" onclick="showhideE(\''+dpClickHistory[i].d_id_py+'\',\'daPianList\',\'daPianChoose\',\'fir down\')" class="fir down">'+dpClickHistory[i].d_id+'</a></li>';
		    	}else{
		    		chooseHtml=chooseHtml+'<li><a style="cursor:pointer" id="choose'+dpClickHistory[i].d_id_py+'" onclick="showhideE(\''+dpClickHistory[i].d_id_py+'\',\'daPianList\',\'daPianChoose\',\'down\')" class="">'+dpClickHistory[i].d_id+'</a></li>';
		    	}
		    }
		    $("#daPianChoose").html(chooseHtml);
	    }
	});
}
$(function() {
    $(".list_block").jCarouselLite({
        btnNext: ".rig_butt_top",
        btnPrev: ".lef_butt_top",
        visible: 5
    });
    if(GetCookie('Uname')){
    	getClickHistory();
    }else{
    	setClickCookie();
    	changeClickHistory();
    }    
    window.setInterval("$('.rig_butt_top').click()", 4000);
});

var dpClick=new Array(0,0,0,0);
var Imovie = new movie();