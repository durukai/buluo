focusids=new Array();
function getfocusuid() {
	$url='/user-focus-getmyfocus';
	$url=(typeof(uid)=='undefined')?$url:$url+'-'+uid;
	if(navigator.userAgent.indexOf('MSIE 6.0')>0||navigator.userAgent.indexOf('MSIE 9.0')>0){
				$url=$url+"-"+Math.random();
		   }
	$.ajax({url:$url,success:function(r){
	focusids=new Array();
	for(var i in r){
	focusids.push(r[i]['focus_uid']);
	}
	if(typeof(uid)!='undefined'){
		if(findexist(parseInt(uid),focusids)){
		$(".personal-intro .focus").html('已关注').attr('data','/user-userdo-delfocus-uid-'+uid);
		}else{
		$(".personal-intro .focus").html('+关注').attr('data','/user-userdo-focususer-uid-'+uid);
		}
	}
	},dataType:'json'});
}
$(".visit_box li,.i-row-box li").hover(
function (e){
$obj=$(this).find('.guanzhu a');
if(!findexist(parseInt($obj.attr('val')),focusids))
{
$obj.removeClass('ated').addClass('focus').html('+关注').attr('data','/user-userdo-focususer-uid-'+$obj.attr('val'));
}else{
$obj.removeClass('focus').addClass('ated').html('已关注').attr('data','/user-userdo-delfocus-uid-'+$obj.attr('val'));
}
$(this).find('.guanzhu').show();
},function(){
			$(this).find('.guanzhu').hide();
		}
);
getfocusuid();
function findexist($id,$arr){
	    var count=$arr.length;
		if(count>0){
		 for(var i=0;i<count;i++){
		   if($arr[i]==$id)
		   {
			 return $arr[i];
		   }
		 }
		}
		return  false;		
	}
