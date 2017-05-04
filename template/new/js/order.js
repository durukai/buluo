function $$(id){return document.getElementById(id);}
function Wnew(len){
	alert(len);
	for(var ui=1; ui<=len; ui++){
		var playbox=$$("play_"+ui)
		var ulbox=$$("vlink_"+ui),litag=ulbox.getElementsByTagName('li'),isno2,rhtml;
		rhtml="";
		if(litag.length>25){playbox.className="playlist mb b max_height";}else{playbox.className="playlist mb b";}
		for(var uii=litag.length-1;uii>=0;uii--){
			if(uii==litag.length-1){isno2='<li class="new">';}else{isno2='<li>';}
			rhtml+=isno2+litag[uii].innerHTML+"</li>";
		}
		rhtml="<ul>"+rhtml+"</ul>";
		ulbox.innerHTML=rhtml;
	}
}
function Order(o,id,vi){
	var tag,leng,i,phtml,box,ubox,uhtml,isno,s1,s2
	box=$$(id);
	tag=box.getElementsByTagName('li');
	leng=tag.length;
	uhtml="";
	if (o==1){
	  for(i=leng-1;i>=0;i--){
		  if(i==leng-1){isno='<li class="new">';}else{isno='<li>';}
		  uhtml+=isno+tag[i].innerHTML+"</li>";
	  }
	  s1="<em class=\"over\">倒序↑</em>"
	  s2="<em onclick=\"Order(0,'vlink_"+vi+"',"+vi+")\">顺序↓</em>"
	}else{
	  for(i=leng-1;i>=0;i--){
		  if(i==0){isno='<li class="new">';}else{isno='<li>';}
		  uhtml+=isno+tag[i].innerHTML+"</li>";
	  }
	  s1="<em onclick=\"Order(1,'vlink_"+vi+"',"+vi+")\">倒序↑</em>"
	  s2="<em class=\"over\">顺序↓</em>"
	}
	$$(id+"_s1").innerHTML=s1;
	$$(id+"_s2").innerHTML=s2;
	uhtml="<ul>"+uhtml+"</ul>";
	box.innerHTML=uhtml;
}