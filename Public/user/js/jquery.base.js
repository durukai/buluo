islogin=0;
function checkcookie(){
	if(document.cookie.indexOf('auth=')>=0){
		islogin=1;
		return true;
	}
	return false;
}
checkcookie();


$(function(){
	// drop-down
	$(".drop-down").hover(function(){		
		$(this).find(".drop-title").addClass("drop-title-hover");
		$(this).find(".drop-box").show();
	},function(){
		$(this).find(".drop-title").removeClass("drop-title-hover");
		$(this).find(".drop-box").hide();
	});		
});

$(document).ready(function(){
			
	// ui-input
	$(".ui-input").focus(function(){
		$(this).addClass("ui-input-focus");
	}).hover(function(){
		$(this).addClass("ui-input-hover");
	},function(){
		$(this).removeClass("ui-input-hover");
	});
	$(".ui-input").blur(function(){
		$(this).removeClass("ui-input-focus");
	});			
	
	// ui-form-placeholder
	$(".ui-form-placeholder").each(function(){
		var _label = $(this).find(".ui-label");
		var _input = $(this).find(".ui-input");
		var _text =  $(this).find(".ui-input").val();
		
		if (_text != ""){
			_label.hide();
		}
		
		_label.css("z-index","3");
		_label.click(function(){
			$(this).hide();
			_input.focus();
		});	
		_input.focus(function(){
			_label.hide();
		});	
	});
		
	// ui-button
	$(".ui-button").hover(function(){
		$(this).addClass("ui-button-hover");
	},function(){
		$(this).removeClass("ui-button-hover");
	});
		
	// close-his	
	$(".close-his").click(function(){
		$(this).parents(".drop-box").hide();
	});
	
	// show-tipinfo
	$(".show-title a").hover(function(){
		$(this).parent().parent().find(".tipInfo").show();
	},function(){		
		$(this).parent().parent().find(".tipInfo").hide();
	});	
	
	$("#wish").trigger('click');
	
	
	
	// timeinfo
	$(".timeinfo").hover(function(){
		$(this).addClass("timeinfo-active");
	},function(){
		$(this).removeClass("timeinfo-active");
	});	
	
	// Date List Jquery
	$(".date-list").each(function(){
		$lis = $(this).find("li:last").index();		
		if($lis > 5){
			$(this).addClass("date-long");
		}	
	});
	
	
});

// Tab Menu JS Common
function setTab(name,cursel,n){
	for(i=1;i<=n;i++){
		var menu=document.getElementById(name+i);
		var con=document.getElementById("con_"+name+"_"+i);
		menu.className=i==cursel?"current":"";
		con.style.display=i==cursel?"block":"none";
	}
}
$(document).ready(function(){			   
	// 异步加载图片
	$(".loading").lazyload({effect : "fadeIn"});
});