//滑动门
function ShowSub(id_num,num){ 

	for(var i = 0;i <= 15;i++){

		if(GetObj("S_Menu_" + id_num + i)){GetObj("S_Menu_" + id_num + i).className = '';}

		if(GetObj("S_Cont_" + id_num + i)){GetObj("S_Cont_" + id_num + i).style.display = 'none';}

	}

	if(GetObj("S_Menu_" + id_num + num)){GetObj("S_Menu_" + id_num + num).className = 'hover';}

	if(GetObj("S_Cont_" + id_num + num)){GetObj("S_Cont_" + id_num + num).style.display = 'block';}

}

function UnSub(id_num,num)

{

		for(var i = 0;i <= 15;i++)

		{

			if(GetObj("S_Menu_" + id_num + num))

			{

				GetObj("S_Menu_" + id_num + num).className = '';

			}

			if(GetObj("S_Cont_" + id_num + num))

			{

				GetObj("S_Cont_" + id_num + num).style.display = 'none';

			}

		}

}



function GetObj(objName){

	if(document.getElementById){

		return eval('document.getElementById("' + objName + '")');

	}else{

		return eval('document.all.' + objName);

	}

}

function Show_Menu(thisObj,Num){if(thisObj.className=="on")return;var dhObj=thisObj.parentNode.id;var dhList=document.getElementById(dhObj).getElementsByTagName("li");for(i=0;i<dhList.length;i++){if(i==Num){thisObj.className="on";document.getElementById(dhObj+"_content"+i).style.display="block"}else{dhList[i].className="off";document.getElementById(dhObj+"_content"+i).style.display="none"}}}

function Show_Menu2(thisObj,Num){if(thisObj.className=="on")return;var dhObj=thisObj.parentNode.id;var dhList=document.getElementById(dhObj).getElementsByTagName("li");for(i=0;i<dhList.length;i++){if(i==Num){thisObj.className=("on t"+i);document.getElementById(dhObj+"_content"+i).style.display="block"}else{dhList[i].className=("off b"+i);document.getElementById(dhObj+"_content"+i).style.display="none"}}}

function Show_Menu3(thisObj,Num){if(thisObj.className=="on")return;var dhObj=thisObj.parentNode.id;var dhList=document.getElementById(dhObj).getElementsByTagName("dt");for(i=0;i<dhList.length;i++){if(i==Num){thisObj.className=("on"+i);document.getElementById(dhObj+"_content"+i).style.display="block"}else{dhList[i].className=("off b"+i);document.getElementById(dhObj+"_content"+i).style.display="none"}}}








function $TAB(x){return document.getElementById(x);}
function tab_show(a,b,c,d){
	x=a,max_i=b,tn=c,tc=d;
	for(var i=1;i<=max_i;i++){
		if($TAB(tn+i))$TAB(tn+i).className=$TAB(tc+i).className="";
	}
	$TAB(tn+x).className=$TAB(tc+x).className="on";
}

function switchTab(identify,index,count,cnon,cnout) {
 for(i=0;i<count;i++) {
	var CurTabObj = document.getElementById("Tab_"+identify+"_"+i) ;
	var CurListObj = document.getElementById("List_"+identify+"_"+i) ;
	if (i!=index) {
		CurTabObj.className=cnout ;
		CurListObj.style.display="none" ;
	}
	} 
	document.getElementById("Tab_"+identify+"_"+index).className=cnon;
	document.getElementById("List_"+identify+"_"+index).style.display="";
} 



//保存收起展开状态
function show_critea_area(){
	try{
		var obj=document.getElementById('all_critirea_issue');
		var bca=document.getElementById('btn_critea_area');
		if(obj){
			if(obj.style.display==''){
				obj.style.display='none';
				bca.innerHTML='展开全部';
				bca.className='on';
				save_critriea_area_status('hide');
			}else{
				obj.style.display='';
				bca.innerHTML='收起全部';
				bca.className='';
				save_critriea_area_status('show');
			}
		}
	}catch(e){}
}






//加入收藏
function AddFavorite(sURL, sTitle)
{
    try
    {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("您使用的浏览器比较特殊，请使用Ctrl+D进行收藏");
        }
    }
}

$(document).ready(function()
{
	//主导航悬停事件处理开始
	var navigation = $("#mainmenu > li");
	$.each(navigation, function(i,domEle){
		var button = $(domEle).children(".mainmenu_li");
		var hidden = $(domEle).children(":hidden");
		button.hover(function(){
			hidden.show();
			button.attr('class',"current mainmenu_li");
		},function(){
			hidden.hide();
			button.attr('class',"mainmenu_li");
		});
		hidden.hover(function(){
			hidden.show();
			button.attr('class',"current mainmenu_li");
		},function(){
			hidden.hide();
			button.attr('class',"mainmenu_li");
		});
		
		var button = $(domEle).children(".mainmenu_li2");
		var hidden = $(domEle).children(":hidden");
		button.hover(function(){
			hidden.show();
			button.attr('class',"current mainmenu_li2");
		},function(){
			hidden.hide();
			button.attr('class',"mainmenu_li2");
		});
		hidden.hover(function(){
			hidden.show();
			button.attr('class',"current mainmenu_li2");
		},function(){
			hidden.hide();
			button.attr('class',"mainmenu_li2");
		});
		
		
	    var button = $(domEle).children(".mainmenu_li3");
		var hidden = $(domEle).children(":hidden");
		button.hover(function(){
			hidden.show();
			button.attr('class',"current mainmenu_li3");
		},function(){
			hidden.hide();
			button.attr('class',"mainmenu_li3");
		});
		hidden.hover(function(){
			hidden.show();
			button.attr('class',"current mainmenu_li3");
		},function(){
			hidden.hide();
			button.attr('class',"mainmenu_li3");
		});
		
	});
});


function qw_on(qwbt,qwpic)
{
			var divonload=new Array("qwbt1","qwbt2","qwbt3","qwbt4","qwbt5","qwbt6","qwbt7","qwbt8","qwbt9","qwbt10")
			for(var i = 0; i < parseInt(10); i++)
			{
				document.getElementById(divonload[i]).className="index0604";
			}
			document.getElementById(qwbt).className="index0603";
			
			var divonload=new Array("qwpic1","qwpic2","qwpic3","qwpic4","qwpic5","qwpic6","qwpic7","qwpic8","qwpic9","qwpic10")
			for(var i = 0; i < parseInt(10); i++)
			{
				document.getElementById(divonload[i]).style.display="none";
			}
			document.getElementById(qwpic).style.display="block";
		}


  function NOShow(){
	  document.getElementById("fixedLayer").style.display="none";
	  }













