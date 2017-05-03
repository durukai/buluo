var timeout         = 500;
var jNum = 5; //此处记录最多记录多少条观看记录

function setCookie(name,value) {
	var Days = 30;
	var exp = new Date;
	exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
	document.cookie = name + ("=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/;");
}

function getCookie(name){
	var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
	if (arr != null) {
		return (unescape(arr[2]));
	}
	return null;
}

function AddHistory(){
	var Str,ShowStr,iArr,TemStr,sArr,jArr;
	Str = getCookie("history");
	if(Str==null){Str = '';}
	if(typeof(play_vid)!="undefined"){
		var d = new Date();
		var years = d.getYear();
		var month = add_zero(d.getMonth()+1);
		var days = add_zero(d.getDate());
		var hours = add_zero(d.getHours());
		var minutes = add_zero(d.getMinutes());
		var seconds=add_zero(d.getSeconds());
		var ndate = month+"-"+days+" "+hours+":"+minutes+":"+seconds;
		if(playtit==''){playtit = "继续播放";}
		TemStr = play_vid+'$'+infotit+'$'+playtit+'$'+infourl+'$'+window.location.href+'$'+ndate+'$$';
		if(Str!="" || Str!="History="){
			iArr = Str.replace("History=","").split("$$");
			var n=0
			for(var i=0;i<iArr.length-1;i++){
				if(play_vid-iArr[i].split("$")[0]!=0 && n<jNum){
					TemStr += iArr[i]+'$$';
					n++;
				}
			} 
		}
		TemStr="History="+TemStr
		setCookie("history",TemStr);
	}
}

function WriteHistory(){
	ShowStr = getCookie("history");
	if(ShowStr=="History=" || ShowStr==null){
		ShowStr = '<li>没有任何观看记录!</li>';
	}else{
		sArr = ShowStr.split("$$");
		ShowStr = '';
		for(var i=0;i<sArr.length-1;i++){
			jArr = sArr[i].split("$");
			if(jArr[1].length>10){jArr[1]=jArr[1].substring(0,7)+"..."}
			ShowStr += '<li><h6><a href="'+jArr[3]+'" class="his_name">'+jArr[1]+'</a><a href="'+jArr[4]+'" class="his_part">['+jArr[2]+']</a></h6><p><a class="del_his" href="javascript:void(0);" onclick="DelHistory('+i+'); return false;" target="_self">[\u5220\u9664]</a><em>'+jArr[5]+'</em></p></li>';
			//jArr[1]=name	jArr[2]=part	jArr[3]=link	jArr[4]=partLink	jArr[5]=time
		}
	
	}
	ShowStr = '<ul><li class="del_history"><a href="javascript:;" onclick="DelHistory(-1); return false;" target="_self">\u6e05\u7a7a\u6240\u6709\u89c2\u770b\u8bb0\u5f55\u0021</a></li>'+ShowStr+"</ul>";
	document.getElementById("history").innerHTML = ShowStr;
}

function DelHistory(i){
	var Str,iArr,TemStr,sArr,jArr,ShowStr;
	TemStr='';
	Str = getCookie("history");
	if(Str!=null){
		if(i==-1){
			document.getElementById("history").innerHTML='<ul><li class="del_history"><a href="javascript:;" onclick="return false;" target="_self">\u6e05\u7a7a\u6240\u6709\u89c2\u770b\u8bb0\u5f55\u0021</a></li><li>没有任何观看记录!</li></ul>'
			TemStr="History=";
			setCookie("history",TemStr); 
		}else{
			iArr = Str.replace("History=","").split("$$");
			for(var j=0;j<iArr.length-1;j++){
				if(j!=i){TemStr += iArr[j]+'$$';} 
			}
			ShowStr='';
			sArr=TemStr.split("$$");
			for(var h=0;h<sArr.length-1;h++){
				jArr = sArr[h].split("$");
				if(jArr[1].length>10){jArr[1]=jArr[1].substring(0,7)+"..."}
				ShowStr += '<li><h6><a href="'+jArr[3]+'" class="his_name">'+jArr[1]+'</a><a href="'+jArr[4]+'" class="his_part">['+jArr[2]+']</a></h6><p><a class="del_his" href="javascript:void(0);" onclick="DelHistory('+h+'); return false;" target="_self">[\u5220\u9664]</a><em>'+jArr[5]+'</em></p></li>';
				//jArr[1]=name	jArr[2]=part	jArr[3]=link	jArr[4]=partLink	jArr[5]=time
			}
			ShowStr = '<ul><li class="del_history"><a href="javascript:;" onclick="DelHistory(-1); return false;" target="_self">\u6e05\u7a7a\u6240\u6709\u89c2\u770b\u8bb0\u5f55\u0021</a></li>'+ShowStr+"</ul>";
			document.getElementById("history").innerHTML = ShowStr;
			TemStr="History="+TemStr
			setCookie("history",TemStr);
		}
	}
}

function add_zero(temp){
     if(temp<10){
        return "0"+temp;
     }else{
       return temp;
     }
}