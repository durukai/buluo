//设为首页 999 设为主页函数
function SetHome(obj,url){
  try{
    obj.style.behavior='url(#default#homepage)';
    obj.setHomePage(url);
  }catch(e){
    if(window.netscape){
     try{
       netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
     }catch(e){
       alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
     }
    }else{
    alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。");
    }
 }
}

//加入收藏函数
function AddFavorite(title, url) {
 try {
   window.external.addFavorite(url, title);
 }
catch (e) {
   try {
    window.sidebar.addPanel(title, url, "");
  }
   catch (e) {
     alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请进入新网站后使用Ctrl+D进行添加");
   }
 }
}

//插入节点函数
var ztInsertNode = function(){
    var oZtHeader = document.getElementById('zt-top');
    var oZtFooter = document.getElementById('zt-footer'); 
 
}


//点击展示更多导航信息插件
;(function($){
  $.fn.showMroe=function(options){  
  var defaults = {
     showMroeEvent:'click',
     outMroeEvent:'click'
  }
  //合并参数
  var options = $.extend(defaults,options);
  this.each(function(){
    var _this = $(this);
   $(this).on(options.showMroeEvent,function(e){
      e.stopPropagation();
      $(this).find('.zt-top-all-classify').toggle();
      $(this).toggleClass('zt-top-add-border');
      $(this).find('.zt-top-menu-btn').toggleClass('zt-top-classify-span-add');
      $(this).find('.zt-top-classify-pic2').toggleClass('zt-top-classify-pic2-add');
   })
   //当事件不是hover的时候那么就不执行下面这段话
   if (!options.showMroeEvent=='hover') {
     $(document).on(options.outMroeEvent,function(){
        _this.find('.zt-top-all-classify').hide();
        _this.removeClass('zt-top-add-border');
        _this.find('.zt-top-menu-btn').removeClass('zt-top-classify-span-add');
        _this.find('.zt-top-classify-pic2').removeClass('zt-top-classify-pic2-add');
      })
    }
  })
  //返回对象，让对象能继续链式操作
  return this;
 }
})(jQuery);



$(function(){
  
  //专题调用插入函数
  ztInsertNode();

  //调用展示更多导航信息
  $('.zt-top-classify-inner').showMroe({
     showMroeEvent:'hover'
  });

});