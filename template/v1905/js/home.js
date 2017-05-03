

String.prototype.replaceAll  = function(s1,s2){ return this.replace(new RegExp(s1,"gm"),s2); }
String.prototype.trim=function(){ return this.replace(/(^\s*)|(\s*$)/g, ""); }
var base64EncodeChars="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";var base64DecodeChars=new Array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,62,-1,-1,-1,63,52,53,54,55,56,57,58,59,60,61,-1,-1,-1,-1,-1,-1,-1,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,-1,-1,-1,-1,-1,-1,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,-1,-1,-1,-1,-1);function base64encode(str){var out,i,len;var c1,c2,c3;len=str.length;i=0;out="";while(i<len){c1=str.charCodeAt(i++)&0xff;if(i==len){out+=base64EncodeChars.charAt(c1>>2);out+=base64EncodeChars.charAt((c1&0x3)<<4);out+="==";break}c2=str.charCodeAt(i++);if(i==len){out+=base64EncodeChars.charAt(c1>>2);out+=base64EncodeChars.charAt(((c1&0x3)<<4)|((c2&0xF0)>>4));out+=base64EncodeChars.charAt((c2&0xF)<<2);out+="=";break}c3=str.charCodeAt(i++);out+=base64EncodeChars.charAt(c1>>2);out+=base64EncodeChars.charAt(((c1&0x3)<<4)|((c2&0xF0)>>4));out+=base64EncodeChars.charAt(((c2&0xF)<<2)|((c3&0xC0)>>6));out+=base64EncodeChars.charAt(c3&0x3F)}return out}function base64decode(str){var c1,c2,c3,c4;var i,len,out;len=str.length;i=0;out="";while(i<len){do{c1=base64DecodeChars[str.charCodeAt(i++)&0xff]}while(i<len&&c1==-1);if(c1==-1)break;do{c2=base64DecodeChars[str.charCodeAt(i++)&0xff]}while(i<len&&c2==-1);if(c2==-1)break;out+=String.fromCharCode((c1<<2)|((c2&0x30)>>4));do{c3=str.charCodeAt(i++)&0xff;if(c3==61)return out;c3=base64DecodeChars[c3]}while(i<len&&c3==-1);if(c3==-1)break;out+=String.fromCharCode(((c2&0XF)<<4)|((c3&0x3C)>>2));do{c4=str.charCodeAt(i++)&0xff;if(c4==61)return out;c4=base64DecodeChars[c4]}while(i<len&&c4==-1);if(c4==-1)break;out+=String.fromCharCode(((c3&0x03)<<6)|c4)}return out}function utf16to8(str){var out,i,len,c;out="";len=str.length;for(i=0;i<len;i++){c=str.charCodeAt(i);if((c>=0x0001)&&(c<=0x007F)){out+=str.charAt(i)}else if(c>0x07FF){out+=String.fromCharCode(0xE0|((c>>12)&0x0F));out+=String.fromCharCode(0x80|((c>>6)&0x3F));out+=String.fromCharCode(0x80|((c>>0)&0x3F))}else{out+=String.fromCharCode(0xC0|((c>>6)&0x1F));out+=String.fromCharCode(0x80|((c>>0)&0x3F))}}return out}function utf8to16(str){var out,i,len,c;var char2,char3;out="";len=str.length;i=0;while(i<len){c=str.charCodeAt(i++);switch(c>>4){case 0:case 1:case 2:case 3:case 4:case 5:case 6:case 7:out+=str.charAt(i-1);break;case 12:case 13:char2=str.charCodeAt(i++);out+=String.fromCharCode(((c&0x1F)<<6)|(char2&0x3F));break;case 14:char2=str.charCodeAt(i++);char3=str.charCodeAt(i++);out+=String.fromCharCode(((c&0x0F)<<12)|((char2&0x3F)<<6)|((char3&0x3F)<<0));break}}return out}

function pagego($url,$total){
	$page=$('#page').val();
	if($page>0&&($page<=$total)){
		if($page>1 || document.URL.indexOf('?')>-1){
			$url=$url.replace('{pg}',$page);
		}
		else{
			if($page==1){
				$url=$url.replace('-{pg}','').replace('{pg}','');
			}
		}
		location.href=$url;
	}
	return false;
}

var MAC={
	'Url': document.URL,
	'Title': document.title,
	'Copy': function(s){
		if (window.clipboardData){ window.clipboardData.setData("Text",s); } 
		else{
			if( $("#mac_flash_copy").get(0) ==undefined ){ $('<div id="mac_flash_copy"></div>'); } else {$('#mac_flash_copy').html(''); }
			$('#mac_flash_copy').html('<embed src='+SitePath+'"images/_clipboard.swf" FlashVars="clipboard='+escape(s)+'" width="0" height="0" type="application/x-shockwave-flash"></embed>');
		}
		alert("澶嶅埗鎴愬姛");
	},
	'Home': function(o,u){
		try{
	    	o.style.behavior='url(#default#homepage)'; o.setHomePage(u);
		}
	    catch(e){
	         if(window.netscape){
	         	try{netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");}
	        	catch(e){alert("姝ゆ搷浣滆娴忚鍣ㄦ嫆缁濓紒璇锋墜鍔ㄨ缃�");}
	            var moz = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
	            moz.setCharPref('browser.startup.homepage',u);
	          }
	     }
	},
	'Fav': function(u,s){
		try{ window.external.addFavorite(u, s);}
		catch (e){
			try{window.sidebar.addPanel(s, u, "");}catch (e){alert("鍔犲叆鏀惰棌鍑洪敊锛岃浣跨敤閿洏Ctrl+D杩涜娣诲姞");}
		}
	},
	'Open': function(u,w,h){
		window.open(u,'macopen1','toolbars=0, scrollbars=0, location=0, statusbars=0,menubars=0,resizable=yes,width='+w+',height='+h+'');
	},
	'Cookie': {
		'Set': function(name,value,days){
			var exp = new Date();
			exp.setTime(exp.getTime() + days*24*60*60*1000);
			var arr=document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
			document.cookie=name+"="+escape(value)+";path=/;expires="+exp.toUTCString();
		},
		'Get': function(name){
			var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
			if(arr != null){ return unescape(arr[2]); return null; }
		},
		'Del': function(name){
			var exp = new Date();
			exp.setTime(exp.getTime()-1);
			var cval = this.Get(name);
			if(cval != null){ document.cookie = name+"="+escape(cval)+";path=/;expires="+exp.toUTCString(); }
		}
	},
	'Login':{
		'Display': true,
		'Init':function($id){
			if($("#"+$id).length==0){ return; }
			this.Create($id);
			$('#'+$id).hover(function(){
				MAC.Login.Show();
			}, function(){
				MAC.Login.FlagHide();
			});
			$("#loginbtn").click(function(){
				MAC.Login.In();
			});
		},
		'Show': function(){
			$('#login_box').show();
		},
		'Hide': function(){
			$('#login_box').hide();
		},
		'FlagHide': function(){
			$('#login_box').hover(function(){
				MAC.Login.Display = false;
				MAC.Login.Show();
			}, function(){
				MAC.Login.Display = true;
				MAC.Login.Hide();
			});
			if(MAC.Login.Display){
				MAC.Login.Hide();
			}
		},
		'Info':function(){
			$.ajax({type:'get',url: SitePath + 'index.php?m=user-ajaxinfo',dataType:'json',timeout: 5000,
				error: function(){
					alert('鐧诲綍澶辫触');
				},
				success: function($r){
					$("#username").html($r.u_name);
					$("#userpoint").html($r.u_points);
					$("#groupname").html($r.ug_name);
				}
			});
		},
		'Create':function($id){
			if($("#login_box").length>0){ $("#login_box").remove(); }
			html = '<div class="drop-box login_box" id="login_box" style="display: none;">';
			if(MAC.Cookie.Get('userid')!=undefined && MAC.Cookie.Get('userid')!=''){ 
				html+='<ul class="logged"><li><a target="_blank" href="'+SitePath+'index.php?m=user-index">鎴戠殑璧勬枡</a></li><li class="logout"><a class="logoutbt" href="javascript:;" onclick="MAC.Login.Out(\''+$id+'\');" target="_self"><i class="ui-icon user-logout"></i>閫€鍑�</a></li></ul>';
			}
			else{
				html+='<form id="loginform" onsubmit="return false;" action="'+SitePath+'index.php?user-check" method="post"><div class="formitem"><label>鐢ㄦ埛锛�</label><input name="username" type="text"  class="input" id="username"/></div><div class="formitem"><label>瀵嗙爜锛�</label><input name="userpass" type="password" class="input" id="userpass"/></div><div class="formitem"><a class="qq-login" href="'+SitePath+'index.php?m=user-reg-ref-qqlogin.html"></a> <input class="formbutton" id="loginbtn" type="submit" value="鐧� 褰�"></div><div class="formitem"><a title="蹇樿瀵嗙爜" class="forgotpass" href="'+SitePath+'index.php?m=user-findpass.html">蹇樿瀵嗙爜?</a>  <a class="reg-btn" href="'+SitePath+'index.php?m=user-reg.html" target="_blank">杩樻病鏈夎处鍙�?</a></div></form>';
			}
			
			html += '</div>';
			$('#'+$id).after(html);
			var w = $('#'+$id).width();
			var h = $('#'+$id).height();
			var position = $('#'+$id).position();
			$('#login_box').css({'left':position.left,'top':(position.top+h)});
		},
		'Out':function($id){
			$.ajax({type:'get',url: SitePath + 'index.php?m=user-logout',timeout: 5000,
				success: function($r){
					MAC.Cookie.Set('userid','',0);
					MAC.Login.Create($id);
				}
			});
		},
		'In':function(){
			if($("#username").val()==''){ alert('璇疯緭鍏ヨ处鎴�'); }
			if($("#userpass").val()==''){ alert('璇疯緭鍏ュ瘑鐮�'); }
			$.ajax({type: 'post',url: SitePath + 'index.php?m=user-check', data:'u_name='+$("#username").val()+'&u_password='+$("#userpass").val(),timeout: 5000,
				error: function(){
					alert('鐧诲綍澶辫触');
				},
				success: function($r){
					if($r.indexOf('鎮ㄨ緭鍏�')>-1){
						alert('璐︽埛鎴栧瘑鐮侀敊璇紝璇烽噸璇�!');
					}
					else if($r.indexOf('鐧诲綍鎴愬姛')){
						location.href=location.href;
					}
					else{
						
					}
				}
			});
		}
	},
	'History': {
		'Limit':10,
		'Days':7,
		'Json': '',
		'Display': true,
		'List': function($id){
			if($("#"+$id).length==0){ return; }
			this.Create($id);
			$('#'+$id).hover(function(){
				MAC.History.Show();
			}, function(){
				MAC.History.FlagHide();
			});
		},
		'Clear': function(){
			MAC.Cookie.Del('mac_history');
			$('#history_box').html('<li class="hx_clear">宸叉竻绌鸿鐪嬭褰曘€�</li>');
		},	
		'Show': function(){
			$('#history_box').show();
		},
		'Hide': function(){
			$('#history_box').hide();
		},
		'FlagHide': function(){
			$('#history_box').hover(function(){
				MAC.History.Display = false;
				MAC.History.Show();
			}, function(){
				MAC.History.Display = true;
				MAC.History.Hide();
			});
			if(MAC.History.Display){
				MAC.History.Hide();
			}
		},
		'Create': function($id){
			var jsondata = [];
			if(this.Json){
				jsondata = this.Json;
			}else{
				var jsonstr = MAC.Cookie.Get('mac_history');
				if(jsonstr != undefined){
					jsondata = eval(jsonstr);
				}
			}
			html = '<dl class="drop-box history_box" id="history_box" style="display:none;position:absolute;">';
			html +='<dt><a target="_self" href="javascript:void(0)" onclick="MAC.History.Clear();">娓呯┖</a> | <a target="_self" href="javascript:void(0)" onclick="MAC.History.Hide();">鍏抽棴</a></dt>';
			if(jsondata.length > 0){
				for($i=0; $i<jsondata.length; $i++){
					if($i%2==1){
						html +='<dd class="odd">';
					}else{
						html +='<dd class="even">';
					}
					html +='<a href="'+jsondata[$i].link+'" class="hx_title">'+jsondata[$i].name+'</a></dd>';
				}
			}else{
				html +='<dd class="hide">鏆傛棤瑙傜湅璁板綍</dd>';
			}
			html += '</dl>';
			$('#'+$id).after(html);
			
			var w = $('#'+$id).width();
			var h = $('#'+$id).height();
			var position = $('#'+$id).position();
			$('#history_box').css({'left':position.left,'top':(position.top+h)});
		},	
		'Insert': function(name,link,typename,typelink,pic){
			var jsondata = MAC.Cookie.Get('mac_history');
			if(jsondata != undefined){
				this.Json = eval(jsondata);
				for($i=0;$i<this.Json.length;$i++){
					if(this.Json[$i].link == link){
						return false;
					}
				}
				if(!link){ link = document.URL; }
				jsonstr = '{video:[{"name":"'+name+'","link":"'+link+'","typename":"'+typename+'","typelink":"'+typelink+'","pic":"'+pic+'"},';
				for($i=0; $i<=this.Limit; $i++){
					if(this.Json[$i]){
						jsonstr += '{"name":"'+this.Json[$i].name+'","link":"'+this.Json[$i].link+'","typename":"'+this.Json[$i].typename+'","typelink":"'+this.Json[$i].typelink+'","pic":"'+this.Json[$i].pic+'"},';
					}else{
						break;
					}
				}
				jsonstr = jsonstr.substring(0,jsonstr.lastIndexOf(','));
				jsonstr += "]}";
			}else{
				jsonstr = '{video:[{"name":"'+name+'","link":"'+link+'","typename":"'+typename+'","typelink":"'+typelink+'","pic":"'+pic+'"}]}';
			}
			this.Json = eval(jsonstr);
			MAC.Cookie.Set('mac_history',jsonstr,this.Days);
		}
	},
	'Suggest': {
		'Show': function($id,$limit,$ajaxurl,$jumpurl){
			try{
			$("#"+$id).autocomplete($ajaxurl,{
				width: 175,scrollHeight: 300,minChars: 1,matchSubset: 1,max: $limit,cacheLength: 10,multiple: true,matchContains: true,autoFill: false,dataType: "json",
				parse:function(obj) {
					if(obj.status){
						var parsed = [];
						for (var i = 0; i < obj.data.length; i++) {
							parsed[i] = {
								data: obj.data[i],value: obj.data[i].d_name,result: obj.data[i].d_name
							};
						}
						return parsed;
					}else{
						return {data:'',value:'',result:''};
					}
				},
				formatItem: function(row,i,max) {
					return row.d_name;
				},
				formatResult: function(row,i,max) {
					return row.d_name;
				}
			}).result(function(event, data, formatted) {
				location.href = $jumpurl + encodeURIComponent(data.d_name);
			});
			}catch(e){}
		}
	},
	'Score': {
		'ajaxurl': 'inc/ajax.php?ac=score',
		'Show':function($f,$tab,$id){
			var str = '';
			if($f==1){
				str = '<div style="padding:5px 10px;border:1px solid #CCC"><div style="color:#000"><strong>鎴戣璇勫垎(鎰熻阿鍙備笌璇勫垎锛屽彂琛ㄦ偍鐨勮鐐�)</strong></div><div>鍏� <strong style="font-size:14px;color:red" id="star_count"> 0 </strong> 涓汉璇勫垎锛� 骞冲潎鍒� <strong style="font-size:14px;color:red" id="star_pjf"> 0 </strong>锛� 鎬诲緱鍒� <strong style="font-size:14px;color:red" id="star_all"> 0 </strong></div><div>';
				for(var i=1;i<=10;i++){ str += '<input type="radio" name="score" id="rating'+i+'" value="1"/><label for="rating'+i+'">'+i+'</label>'; }
				str += '&nbsp;<input type="button" value=" 璇� 鍒� " id="scoresend" style="width:55px;height:21px"/></div></div>';
			}
			else{
				str += '<div class="star"><span id="star_tip"></span><ul><li class="star_current"></li>';
				for(var i=1;i<=10;i++){ str += '<li><a value="'+i+'" class="star_'+i+'">'+i+'</a></li>'; }
				str += '</ul>';
				str +='<span id="star_hover"></span><p><span id="star_shi">0</span><span id="star_ge">.0</span><span class="star_no">(宸叉湁<label id="star_count">0</label>浜鸿瘎鍒�)</span></p></div>';
			}
			document.write(str);
			$.ajax({type: 'get',url: SitePath + this.ajaxurl + '&tab='+$tab+'&id='+$id,timeout: 5000,
				error: function(){
					alert('璇勫垎鍔犺浇澶辫触');
					$(".star").html('璇勫垎鍔犺浇澶辫触');
				},
				success: function($r){
					MAC.Score.View($r);
					if($f==1){
						$("#scoresend").click(function(){
							var rc=false;
							for(var i=1;i<=10;i++){ if( $('#rating'+i).get(0).checked){ rc=true; break; } }
							if(!rc){alert('浣犺繕娌￠€夊彇鍒嗘暟');return;}
							MAC.Score.Send( '&tab='+$tab+'&id='+$id+'&score='+i );
						});
					}
					else{
						
						var tip=new Array("","寰堝樊锛屾氮璐圭敓鍛�","寰堝樊锛屾氮璐圭敓鍛�","涓嶅枩娆�","涓嶅枩娆�","涓€鑸紝涓嶅Θ涓€鐪�","涓€鑸紝涓嶅Θ涓€鐪�","涓€鑸紝涓嶅Θ涓€鐪�","鍠滄锛屽€煎緱鎺ㄨ崘","鍠滄锛屽€煎緱鎺ㄨ崘","闈炲父鍠滄锛屼笉瀹归敊杩�");
						$(".star>ul>li>a").mouseover(function(){
							$("#star_hover").html($(this).attr('value')+"鍒� ");
							$("#star_tip").html(tip[$(this).attr('value')]);
							$(".star_current").css("display","none");
						});
						$(".star>ul>li>a").mouseout(function(){
							$("#star_hover").html("");
							$("#star_tip").html("");
							$(".star_current").css("display","block");
						});
						$(".star>ul>li>a").click(function(){
							MAC.Score.Send( '&tab='+$tab+'&id='+$id+'&score='+$(this).attr('value') );
						});
					}
				}
			});
		},
		'Send':function($u){
			$.ajax({type: 'get',url: SitePath + this.ajaxurl + $u,timeout: 5000,
				error: function(){
					$(".star").html('璇勫垎鍔犺浇澶辫触');
				},
				success: function($r){
					if($r=="haved"){
						alert('浣犲凡缁忚瘎杩囧垎鍟�');
					}else{
						MAC.Score.View($r);
					}
				}
			});
		},
		'View':function($r){
			$r = eval('(' + $r + ')');
			$("#rating"+Math.floor($r.score)).attr('checked',true);
			$("#star_count").text( $r.scorenum );
			$("#star_all").text( $r.scoreall );
			$("#star_pjf").text( $r.score );
			$("#star_shi").text( parseInt($r.score) );
			$("#star_ge").text( "." +  ($r.score.toString().split('.')[1]==undefined ? '0' : $r.score.toString().split('.')[1]) );
			$(".star_current").width($r.score*10);
		}
	},
	'Digg': {
		'Show': function($ajaxurl) {
			$('.digg_vodup').click(function(){
				MAC.Digg.Send($ajaxurl,'vod','up');
			});
			$('.digg_voddown').click(function(){
				MAC.Digg.Send($ajaxurl,'vod','down');
			});
			$('.digg_artup').click(function(){
				MAC.Digg.Send($ajaxurl,'art','up');
			});
			$('.digg_artdown').click(function(){
				MAC.Digg.Send($ajaxurl,'art','down');
			});
			
			if($(".digg_vodup").length || $("#digg_voddown").length){
				MAC.Digg.Send($ajaxurl,'vod','');
			}
			if($(".digg_artup").length || $("#digg_artdown").length){
				MAC.Digg.Send($ajaxurl,'art','');
			}
		},	
		'Send': function($ajaxurl,$tab,$ac){
			$.ajax({type: 'get',timeout: 5000, url: $ajaxurl + "&tab="+$tab+"&ac2="+$ac ,
				error: function(){
					alert('椤惰俯鏁版嵁鍔犺浇澶辫触');
				},
				success: function($r){
					if($r=="haved"){
						alert('浣犲凡缁忚瘎杩囧垎鍟�');
					}else{
						MAC.Digg.View($tab,$r);
					}
				}
			});
		},
		'View': function ($tab,$r){
			if($tab == 'vod'){
				$(".digg_vodup>span").html($r.split(':')[0]);
				$(".digg_voddown>span").html($r.split(':')[1]);
			}
			else if($tab = 'art'){
				var Digs = $r.split(':');
				var sUp = parseInt(Digs[0]);
				var sDown = parseInt(Digs[1]);
				var sTotal = sUp+sDown;
				var spUp=(sUp/sTotal)*100;
				spUp = Math.round(spUp*10)/10;
				var spDown = 100-spUp;
				spDown = Math.round(spDown*10)/10;
				if(sTotal!=0){
					$('#digg_artup_val').html(sUp);
					$('#digg_artdown_val').html(sDown);
					$('#digg_artup_sp').html(spUp+'%');
					$('#digg_artdown_sp').html(spDown+'%');
					$('#digg_artup_img').width(parseInt((sUp/sTotal)*55));
					$('#digg_artdown_img').width(parseInt((sDown/sTotal)*55));
				}
			}
		}
	},
	'Comment':{
		'Show':function($ajaxurl){
			if($("#comment").length>0){
				if($ajaxurl.indexOf('{pg}')>0){
					$ajaxurl = $ajaxurl.replace('{pg}',$("#page").val() );
				};
				
				$.ajax({
					type: 'get',
					url: $ajaxurl,
					timeout: 5000,
					error: function(){
						$("#comment").html('璇勮鍔犺浇澶辫触锛岃鍒锋柊...');
					},
					success:function($r){
						$("#comment").html($r);
					}
				});
			}
		},
		'Post':function(){
			if($("#c_content").val() == '璇峰湪杩欓噷鍙戣〃鎮ㄧ殑涓汉鐪嬫硶锛屾渶澶�200涓瓧銆�'){
				alert('璇峰彂琛ㄦ偍鐨勮瘎璁鸿鐐癸紒');
				return false;
			}
			$.ajax({
				type: 'post',
				url: SitePath+'index.php?m=comment-save',
				data: "vid="+SiteId+"&aid="+SiteAid+"&c_name="+$("#c_name").val()+"&c_content="+$("#c_content").val()+"&c_code="+$("#c_code").val(),
				success:function($r){
					if($r == 'ok'){
						MAC.Comment.Show(SitePath+'index.php?m=comment-show-aid-'+SiteAid+'-vid-'+SiteId);
					}
					else{
						alert($r);
					}
					$("#c_code_img").attr("src",SitePath+'inc/common/code.php?a=comment&s='+Math.random());
				}
			});
		},
		'Reply':function($id){
			$("#c_rid").val($id);
			window.scrollTo(0, $("#c_content").offset().top-30);
		}
	},
	'Lazyload':{
		'Show': function(){
			$("img.lazy").lazyload();
			try {  }catch(e){};
		},
		'Box': function($id){
			$("img.lazy").lazyload({
				 container: $("#"+$id)
			});	
		}
	},
	'Desktop':function(s){
		location.href= SitePath + "inc/ajax.php?ac=desktop&name="+encodeURI(s)+"&url=" + encodeURI(location.href);
	},
	'Timming':function(){
		var t=(new Image());t.src=SitePath+'inc/timming.php?t='+Math.random();
	},
	'Hits':function(tab,id){
		$.get(SitePath+"inc/ajax.php?ac=hits&tab="+tab+"&id="+id,function(r){$('#hits').html(r);});
	},
	'Error':function(tab,id,name){
		MAC.Open(SitePath+"inc/err.html?tab="+tab+"&id="+id+"&name="+ encodeURI(name),400,220);
	},
	'UserFav':function(id){
		$.get(SitePath+"inc/ajax.php?ac=userfav&id="+id+"&rnd="+Math.random(),function(r){
			if(r=="ok"){ alert("浼氬憳鏀惰棌鎴愬姛"); }
			else if(r=="login"){ alert('璇峰厛鐧诲綍浼氬憳涓績鍐嶈繘琛屼細鍛樻敹钘忔搷浣�'); }
			else if(r=="haved"){ alert('鎮ㄥ凡缁忔敹钘忚繃浜�'); }
			else{ alert('鍙戠敓閿欒'); }
		});
	},
	'AddEm':function(obj,i){
		var oldtext = $('#'+obj).val();
 		$('#'+obj).val( oldtext + '[em:' + i +']' );
	},
	'Remaining':function(obj,len,spid){
		var count = len - $(obj).val().length;
		if(count < 0){ 
			count = 0;
			$(obj).val($(obj).val().substr(0,200));
		}
		$('#'+spid).text(count);
	},
	'AdsWrap':function(w,h,n){
		document.writeln('<img width="'+w+'" height="'+h+'" alt="'+n+'" style="background-color: #CCCCCC" />');
	},
	'Js':function(){
	
	}
}

$(function(){
	//寮傛鍔犺浇鍥剧墖鍒濆鍖�
	MAC.Lazyload.Show();
	//鍘嗗彶璁板綍鍒濆鍖�
	MAC.History.List('history');
	//鐢ㄦ埛鐧诲綍鍒濆鍖�
	MAC.Login.Init('login');
	//鎼滅储鑱旀兂鍒濆鍖�
	MAC.Suggest.Show('wd',10, SitePath+'inc/ajax.php?ac=suggest&aid='+SiteAid, SitePath+'index.php?m=vod-search-wd-');
	//椤惰俯鍒濆鍖�
	MAC.Digg.Show(SitePath+'inc/ajax.php?ac=digg&aid='+SiteAid+'&id='+SiteId);
	//ajax璇勮鍒濆鍖�
	MAC.Comment.Show(SitePath+'index.php?m=comment-show-aid-'+SiteAid+'-vid-'+SiteId);
	//瀹氭椂浠诲姟鍒濆鍖�
	MAC.Timming();
});
