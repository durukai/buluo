$("#loginform #loginbt").click(function(e) {
	userlogin();
});
function userlogin() {
	if ($("#username").val() == '用户名') {
		$.showfloatdiv({
			txt: '请输入正确的用户名'
		});
		$("#username").focus();
		$.hidediv({});
	} else if ($("#password").val() == '') {
		$.showfloatdiv({
			txt: '请输入密码'
		});
		$("#password").focus();
		$.hidediv({});
	} else {
		$("#loginform").qiresub({
			curobj: $("#loginbt"),
			txt: '数据提交中,请稍后...',
			onsucc: function(result) {
				$.hidediv(result);
				if (parseInt(result['rcode']) > 0) {
					qr.gu({
						ubox: 'unm',
						rbox: 'innermsg',
						h3: 'h3',
						logo: 'userlogo'
					});
					try {
						PlayHistoryObj.viewPlayHistory('playhistory');
					} catch(e) {}
					$("#cboxClose").trigger('click');
				}else if(parseInt(result['rcode'])==-3){
				 
				}
			}
		}).post({
			url: Root + 'index.php?s=User-Center-login'
		});
		return false;
	}
}
$(".focus,.ated").click(function(e) {
    //if(parseInt($(this).attr('data'))>0){
    $.showfloatdiv({
        txt: '数据提交中...',
        cssname: 'loading'
    });
    var obj = $(this);
    $.ajax({
        url: obj.attr('data'),
        success: function(r) {
            $.hidediv(r);
            if (parseInt(r.rcode) > 0) {
                if (r.docode == 2) {
                    obj.removeClass('ated').addClass('focus').html('+关注').attr('data','/user-userdo-focususer-uid-'+obj.attr('val'));
                } else {
                    obj.removeClass('focus').addClass('ated').html('已关注').attr('data','/user-userdo-delfocus-uid-'+obj.attr('val'));
                }
                if (typeof(getfocusuid) == 'function') {
                    getfocusuid();
                }
            }
        },
        dataType: 'json'
    });
    //}
});

document.writeln("<div data-type=\"4\" data-plugin=\"aroundbox\" data-plugin-aroundbox-x=\"left\" data-plugin-aroundbox-y=\"bottom\" data-plugin-aroundbox-iconSize=\"60x60\"  data-plugin-aroundbox-fixed=\"1\" data-plugin-aroundbox-offsetX=\"10\"><\/div>")