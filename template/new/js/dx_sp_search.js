 function pinyinOption(currentTxt) {
    	if(currentTxt==""){
    		return;
    	}
        var t = setTimeout(function () {  
              $.get('/getdata.php', { q: currentTxt }, function(data,textStatus){
            	  //alert(data);
            	  data=eval(data);
            	  var resultDiv=$("#resultDiv");
            	  var str="<ul>";
            	  if(data!="null" && data!=""){
	 	          for(var p in data)
	 	          {
	 	           if(data[p].img != null && data[p].img != "undefined"){
		 	           str += '<li class="h_over"><img src="'+data[p].img+'" width="40px" height="40px" style="margin:3px 0px"/><span>'+data[p].name+'</span></li>';
	 	           }else{
		 	           str += '<li>'+data[p].name+'</li>';
	 	           }
    	 	      }
	 	         str +="</ul>";
	 	           	resultDiv.empty().append(str);
	 	           	resultDiv.show();
            	  }else{
            		  resultDiv.hide();  
            	  }
                 $("#resultDiv li").hover(function () {  
                      $(this).addClass("esultDivLiHover");  
                  }, function () {  
                       $(this).removeClass("esultDivLiHover");  
                   });  
                   $("#resultDiv").blur(function () {  
                        $("#resultDiv").hide();  
                    }); 
                   $("body").click(function () {  
                       $("#resultDiv").hide();  
                   }); 
                  $("#resultDiv li").click(function (event) {  
                        $("#keywords").val($(this).text()); 
                        $("#sform").submit();
                   });  
                   //键盘上下键控制  
                   var index = -1;    //标记上下键时所处位置  
            
                   document.documentElement.onkeydown = function (e) {  
                      e = window.event || e;  
                       if (e.keyCode == 40) {  //下键操作  
                           if (++index == $("#resultDiv li").length) {  //判断加一操作后index值是否超出列表数目界限  
                               index = -1;             //超出的话就将index值变为初始值  
                               $("#keywords").val(currentTxt);    //并将文本框中值设为用户用于搜索的值  
                               $("#resultDiv li").removeClass("esultDivLiHover");  
                           }  
                          else {  
                               $("#keywords").val($($("#resultDiv li")[index]).text());  
                               $($("#resultDiv li")[index]).siblings().removeClass("esultDivLiHover").end().addClass("esultDivLiHover");  
                            }  
                        }  
                     if (e.keyCode == 38) {  //上键操作  
                          if (--index == -1) {    //判断自减一后是否已移到文本框  
                             $("#keywords").val(currentTxt);  
                              $("#resultDiv li").removeClass("esultDivLiHover");  
                           }  
                           else if (index == -2) {     //判断index值是否超出列表数目界限  
                               index = $("#resultDiv li").length - 1;  
                                $("#keywords").val($($("#resultDiv li")[index]).text());  
                               $($("#resultDiv li")[index]).siblings().removeClass("esultDivLiHover").end().addClass("esultDivLiHover");  
                           }  
                            else {  
                                $("#keywords").val($($("#resultDiv li")[index]).text());  
                              $($("#resultDiv li")[index]).siblings().removeClass("esultDivLiHover").end().addClass("esultDivLiHover");  
                         }  
                      }  
                 };  
              });  
             
          }, 100);  
     
     } 

function keyUp(e) {
　 var currKey=0,e=e||event;
　 currKey=e.keyCode||e.which||e.charCode;
　 var keyName = String.fromCharCode(currKey);
   var currentTxt = $("#keywords").val(); 
   if( document.activeElement.id=="keywords" && currentTxt != "" && currKey != 40 && currKey != 38){
   	 currentTxt = $("#keywords").val();  
     pinyinOption(currentTxt);  
   }
}
document.onkeyup = keyUp;