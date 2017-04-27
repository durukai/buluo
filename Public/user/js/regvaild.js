/**
 * 验证页面已修改 2013.7.25
 */

$.formValidator.initConfig({
	formID : "regform",
	debug : false,
	submitOnce : false,
	onSuccess : function() {
		//debugger ;
		$("#regform").qiresub({
			curobj : $("#register"),
			txt : '数据提交中,请稍后...',
			onsucc : function(result) {
				$.hidediv(result);
				if (parseInt(result['rcode']) == 1) {
					$("#t").val(result['t']);
					$("#regform").unbind();
					$("#regform").submit();
				}
			}
		}).post({
			url : 'index.php?s=User-Center-reg'
		});
		return false;
	},
	onError : function(msg, obj, errorlist) {
		$("#errorlist").empty();
		$.map(errorlist, function(msg) {
			$("#errorlist").append("<li>" + msg + "</li>")
		});
	},
	submitAfterAjaxPrompt : '有数据正在异步验证，请稍等...'
});

// Email
$("#email")
		.formValidator({
			onShow : "请输入真实正确的邮箱地址",
			onFocus : "邮箱必须填写真实正确邮箱，要激活才能登陆！",
			onCorrect : "填写正确",
			defaultValue : ""
		})
		.inputValidator({
			min : 6,
			max : 100,
			onError : "你输入的邮箱长度非法,请确认"
		})
		.regexValidator(
				{
					regExp : "^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",
					onError : "你输入的邮箱格式不正确"
				}).ajaxValidator({
			type : "get",
			dataType : "json",
			async : false,
			url : "index.php?s=User-Center-validemail-email-",
			// data:"bb="+$(this).val(),
			success : function(data) {
				if (parseInt(data.status) > 0) {
					return true
				} else {
					return false;
				}
			},
			onError : "此email不可用",
			onWait : "正在对Email进行合法性校验，请稍候..."
		});

// Username
$("#username").formValidator({
	onShow : "请输入4-15位的用户名",
	onFocus : "用户名至少4个字符,最多15个字符",
	onCorrect : "该用户名可以注册"
}).inputValidator({
	min : 4,
	max : 15,
	onError : "你输入的用户名非法,请确认"
}).regexValidator({
	regExp : "myusername",
	dataType : "enum",
	onError : "用户名格式不正确"
}).ajaxValidator({
	dataType : "json",
	async : true,
	cache : false,
	url : "index.php?s=User-Center-valideusername-username-",
	success : function(data) {
		if (parseInt(data.status) > 0) {
			return true
		} else {
			return false;
		}
	},
	onError : "该用户名不可用，请更换用户名",
	onWait : "正在对用户名进行合法性校验，请稍候..."
});
//
// // Password
$("#password").formValidator({
	onShow : "请输入密码",
	onFocus : "至少6个长度",
	onCorrect : "密码输入正确",
	onError : '密码在6-16位'
}).inputValidator({
	min : 6,
	empty : {
		leftEmpty : false,
		rightEmpty : false,
		emptyError : "密码两边不能有空符号"
	},
	onError : "密码在6-16位"
});
//
// // Verifypassword
$("#verifypass").formValidator({
	onShow : "输再次输入密码",
	onFocus : "至少6个长度",
	onCorrect : "密码一致"
}).inputValidator({
	min : 6,
	empty : {
		leftEmpty : false,
		rightEmpty : false,
		emptyError : "重复密码两边不能有空符号"
	},
	onError : "重复密码不能为空,请确认"
}).compareValidator({
	desID : "password",
	operateor : "=",
	onError : "2次密码不一致,请确认"
});
//
// // Verimgbut
$("#verimgbut,#verimg").click(function() {
	$("#verimg").attr('src', "index.php?s=User-Checkcode-index-" + Math.random());
});
//
// // Validate
$("#validate").formValidator({
	onShow : "输入上图字母",
	onFocus : "输入上图字母",
	onCorrect : "验证码正确"
}).inputValidator({
	min : 4,
	max : 4,
	onError : "验证码错误"
}).regexValidator({
	regExp : "^[A-Za-z0-9]+$",
	onError : "你输入的格式不正确"
}).ajaxValidator({
	dataType : "json",
	async : true,
	cache : false,
	url : "index.php?s=User-Center-validecode-imgcode-",
	success : function(data) {
		if (parseInt(data.status) > 0) {
			return true;
		} else {
			return false;
		}
	},
	onError : "验证码不正确",
	onWait : "正在对验证码不正确，请稍候..."
});

$("#agreement").formValidator({
	onShow : "请阅读协议",
	onCorrect : "输入正确"
}).inputValidator({
	min:1,
	max:1,
	onError:"请阅读协议"
});


function resend_email(){
	
}