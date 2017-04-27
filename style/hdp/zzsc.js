function bindCarousel(){
    jQuery('#carousel_point li').click(function(){
        jQuery('#carousel_point li.libg').removeClass('libg')
        jQuery(this).addClass('libg');
        var img_num = parseInt(jQuery(this).attr('turn'));
        carousel(img_num);
    })
}

function showPvNum(pv){
    var len = String(pv).length;
    var count = 1;
    for(var i = len - 1 ; i >=0 ; i--){
        var num = -parseInt(String(pv).charAt(i));
        jQuery('#pv_num').prepend('<li style="background-position:0 '+num*35+'px"></li>');
        if( count%3 == 0 && i != 0 ){
            jQuery('#pv_num').prepend('<li class="point"></li>');
        }
        count++;
    }
}

function showGarbageNum(garbage_num){
    var len = String(garbage_num).length;
    var count = 1;
    for(var i = len - 1 ; i >=0 ; i--){
        var num = -parseInt(String(garbage_num).charAt(i));
        jQuery('#garbage_num').prepend('<li style="background-position:0 '+num*30+'px"></li>');
        if( count%3 == 0 && i != 0 ){
            jQuery('#garbage_num').prepend('<li class="point"></li>');
        }
        count++;
    }
}

var last_cmt_num = 0;
function getCmtNum(){
    jQuery.ajax({
        type: 'get',
        dataType: 'json',
        cache: false,
        success: function(data){
            if(data.success){
                var random = Math.round(Math.random()*10) - 5;
                if( data.cmt_num > last_cmt_num ){
                    var num = data.cmt_num + random;
                    show_num(num);
                }
                last_cmt_num = data.cmt_num;
            }
        }
    });
}

function show_num(n){ 
    //先补齐缺少的数字位数
    var it = jQuery('#cmt_num li.num_item');
    var len = String(n).length;
    for(var i = it.length + 1; i <= len; i++){
        jQuery('#cmt_num').prepend('<li class="num_item"></li>');
        if( i%3 == 0 && i != len){
            jQuery('#cmt_num').prepend('<li class="point"></li>')
        }
    }
    //重新获取用于显示数字的dom元素
    it = jQuery('#cmt_num li.num_item'); 
    
    for(var i = 0; i < len; i++ ){ 
        var num=String(n).charAt(i); 
        var y = -parseInt(num)*50; //y轴位置 
        var obj = jQuery("#cmt_num li.num_item").eq(i); 
        obj.animate({ //滚动动画 
            backgroundPosition :'(0 '+String(y)+')'  
            }, 'slow','swing',function(){}
        ); 
    }
}

function carousel(n){
    var fadout_dom = jQuery('#carousel_container .pt:visible');
    fadout_dom.removeClass('pt_cur');
    fadout_dom.fadeOut(978);
    var fadin_dom = jQuery('#carousel_container .pt').eq(n-1);
    fadin_dom.fadeIn(978,
	function(){
    	fadin_dom.addClass('pt_cur');
    });
    if(n==1){
        jQuery('#carousel_up').addClass('uN');
        jQuery('#carousel_up').removeAttr('onclick');
        jQuery('#carousel_down').removeClass('dN');
        jQuery('#carousel_down').attr('onclick','carouselNext()');
    }
    else if(n==5){
        jQuery('#carousel_down').addClass('dN');
        jQuery('#carousel_down').removeAttr('onclick');
        jQuery('#carousel_up').removeClass('uN');
        jQuery('#carousel_up').attr('onclick','carouselPrevious()');
    }
    else{
        jQuery('#carousel_up').removeClass('uN');
        jQuery('#carousel_up').attr('onclick','carouselPrevious()');
        jQuery('#carousel_down').removeClass('dN');
        jQuery('#carousel_down').attr('onclick','carouselNext()');
    }
    clearTimeout(carousel_taskId);
    carousel_taskId = setTimeout(carouselNext,4000);
}
function carouselNext(){
    var cur_cursor = jQuery('#carousel_point li.libg').removeClass('libg');
    var cur_img_turn = parseInt(cur_cursor.attr('turn'));
    var next_img_turn;
    if(cur_img_turn==5){
        next_img_turn = 1;
    }else{
        next_img_turn = cur_img_turn + 1;
    }
    var next_cursor = jQuery('#carousel_point li[turn='+next_img_turn+']');
    next_cursor.addClass('libg');
    carousel(next_img_turn);
}
function carouselPrevious(){
    var cur_cursor = jQuery('#carousel_point li.libg').removeClass('libg');
    var cur_img_turn = parseInt(cur_cursor.attr('turn'));
    var previous_img_turn;
    if(cur_img_turn==1){
        previous_img_turn = 5;
    }else{
        previous_img_turn = cur_img_turn - 1;
    }
    var previous_cursor = jQuery('#carousel_point li[turn='+previous_img_turn+']');
    previous_cursor.addClass('libg');
    carousel(previous_img_turn);
}