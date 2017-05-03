/* 宽屏轮播图 */
;(function($){

  $.fn.bigFigure = function(options){
    var defaults = {
            figureBtnEvent:'click',  //轮播按钮事件
            figureTime:5000,         //切换时间
            figureBtnAct: 'add-active', //按钮 li 的样式
            aroundEvent:'click',     //左右按钮事件
            showButton: true ,       //显示左右按钮
            switcHover: true         //移入banner的时候图片是否切换
    }
    options = $.extend(defaults,options);

    this.each(function(){
      //_this指的是#banner
        var _this = $(this);
        var timer,timerTwo;
        var figureNum = 0;
        var bannerPicLi = _this.find('.banner-pic-inner').children(); //图片的li
        var bannerBtnLi = _this.find('.banner-btn-inner').children(); //按钮的li
        var bannerIntroLi = _this.find('.banner-intro-ul').children(); //简介的li
        var bannerPicLiLen = bannerPicLi.length; //获得图片的个数
        var leftBtn = _this.find('.left-btn');  //左按钮
        var rightBtn = _this.find('.right-btn'); //右按钮
        var bannerBtn = _this.find('.banner-btn');
        var bannerSwapBtn = _this.find('.banner-swap-btn');
        var win = $(window); 

        bannerBtnLi.eq(0).addClass(options.figureBtnAct).siblings().removeClass(options.figureBtnAct);

          function cutLi(){
             bannerPicLi.eq(figureNum).fadeIn().siblings().fadeOut();
             bannerBtnLi.eq(figureNum).addClass(options.figureBtnAct).siblings().removeClass();
             bannerIntroLi.eq(figureNum).fadeIn().siblings().fadeOut();
          }
          //是否显示左右按钮
          if (options.showButton) {
              bannerSwapBtn.show();
            leftBtn.bind(options.aroundEvent,function(){
                if (figureNum == 0) {
                    figureNum = bannerPicLiLen-1;
                }else{
                   figureNum --;
                }
               if(!bannerPicLi.is(":animated")){ 
                   cutLi();
                }
            });
            rightBtn.bind(options.aroundEvent,function(){
                if (figureNum >= bannerPicLiLen - 1) {
                  figureNum = 0;
                }else{
                  figureNum++;
                }
                if(!bannerPicLi.is(":animated")){ 
                   cutLi();
                }
            });
           }

          //当按钮点击的时候切换到
          bannerBtnLi.bind(options.figureBtnEvent,function(){
            var thisIndex = $(this).index();
            var _this = $(this);
            figureNum = thisIndex;  
            timerTwo = setTimeout(function(){
                _this.addClass(options.figureBtnAct).siblings().removeClass();
                bannerPicLi.eq(figureNum).fadeIn().siblings().fadeOut();
                bannerIntroLi.eq(figureNum).fadeIn().siblings().fadeOut();
            },300);
            })
           bannerBtnLi.bind('mouseout',function(){
             clearTimeout(timerTwo);
           });

          function switchPic(){
             //根据循环来切换图片或样式
             if (figureNum >= bannerPicLiLen - 1) {
              figureNum = 0;
             }else{
                figureNum++;
             }
             cutLi();
          }
         timer = setInterval(switchPic,options.figureTime);
         
         if (options.switcHover) {
            _this.find('i').hover(function() {
                clearInterval(timer);
            }, function() {
                timer = setInterval(switchPic,options.figureTime); 
            });
         }
         //当window宽度小于1200的时候那么执行条件

         var bannerIntro = $('.banner-intro');
         function shrink(){

          var winWidth = win.width();
          if (winWidth <= 1280) {
              var winscroll = $(window).scrollLeft();
              bannerBtn.width(1000);
              bannerSwapBtn.width(1000);
              // bannerPicLi.width(winWidth+winscroll);
              // bannerIntro.width(winWidth+winscroll);
          }else{
              bannerBtn.width(1200);
              bannerSwapBtn.width(1200);
              bannerPicLi.width('100%');
              bannerIntro.width('100%');
          }
         }
            shrink();

          //当浏览器缩小的时候
          win.resize(function(){
            shrink();
          });
          

          win.scroll(function(){
            shrink();
          });
    })
    return this;
  }

})(jQuery);



//滑动菜单
;(function($){

   $.fn.slideMenu=function(options){
    var defaults = {
        firstEvent:'mouseover', //当li移过去的事件
        secondEvent:'mouseout', //当li移开的事件
        thirdEvent:'click',   //当li点击的事件
        activeStyle:'.active-style', //要移动的那个元素
        active:'active-style5',  //要给样式的那个元素
        marginNum:20  //元素偏移值
    }
  
   options = $.extend(defaults,options);

   this.each(function(){
      var _this = $(this);
      //离开的时候那么就进行遍历寻找有active的那个元素
      function eachLi(){
         _this.find('li').each(function(){
         var thisWidth = $(this).width();
         var thisIndex = $(this).index();
            if ($(this).hasClass(options.active)) {
            _this.siblings(options.activeStyle).stop().animate({'left':thisIndex*(thisWidth+options.marginNum)+'px'}, 200);
            };
         });
      }

      eachLi();

      //当li移动的时候
      _this.find('li').bind(options.firstEvent,function(){
         var thisWidth = $(this).width();
         var thisIndex = $(this).index();
         _this.siblings(options.activeStyle).stop().animate({'left':thisIndex*(thisWidth+options.marginNum)+'px'}, 200);
      }).bind(options.secondEvent,function(){
         eachLi();
      });

      _this.find('li').bind(options.thirdEvent,function(){
         $(this).addClass(options.active).siblings().removeClass(options.active);
      });

   });
    return this;
   }
})(jQuery);


//超过数字改变颜色
;(function($){
  
  $.fn.beyondNum = function(options){
    var defaults = {
      node:'i',
      beyondnum:3,
      activeClass:'active-style6'
    }
    options = $.extend(defaults,options);
    this.each(function(){
     var _this = $(this);
     var iNode = _this.find(options.node);
     var iNodeLen = iNode.length;
     for(var i=0;i<iNodeLen;i++){
       if (i<options.beyondnum) {
         iNode.eq(i).addClass(options.activeClass);
       }
     }

    });
    return this;
  }
 
})(jQuery);




//图片延时加载
;(function($) {
  $.fn.scrollLoading = function(options) {
    var defaults = {
      attr: "data-url",
      container: $(window),
      callback: $.noop
    };
    var params = $.extend({}, defaults, options || {});
    params.cache = [];
    $(this).each(function() {
      var node = this.nodeName.toLowerCase(), url = $(this).attr(params["attr"]);
      //重组
      var data = {
        obj: $(this),
        tag: node,
        url: url
      };
      params.cache.push(data);
    });
    
    var callback = function(call) {
      if ($.isFunction(params.callback)) {
        params.callback.call(call.get(0));
      }
    };
    //动态显示数据
    var loading = function() {
      
      var contHeight = params.container.height();
      if (params.container.get(0) === window) {
        contop = $(window).scrollTop();
      } else {
        contop = params.container.offset().top;
      }   
      
      $.each(params.cache, function(i, data) {
        var o = data.obj, tag = data.tag, url = data.url, post, posb;
        
        if (o) {
          post = o.offset().top - contop, posb = post + o.height();
          if ((post >= 0 && post < contHeight) || (posb > 0 && posb <= contHeight)) {
            if (url) {
              //在浏览器窗口内
              if (tag === "img") {
                //图片，改变src
                callback(o.attr("src", url));   
              } else {
                o.load(url, {}, function() {
                  callback(o);
                });
              }   
            } else {
              // 无地址，直接触发回调
              callback(o);
            }
            data.obj = null;  
          }
        }
      }); 
    };
    
    //事件触发
    //加载完毕即执行
    loading();
    //滚动执行
    params.container.bind("scroll", loading);
  };
})(jQuery);


//观看记录显示隐藏
;(function($){
  $.fn.showMoreTwo=function(options){
    var defaults = {
      childrenNodeOne:'.watch-box', //按钮
      childrenNodeTwo:'.watch-list', //要显示的那个元素
      firstEvent:'mouseover',  //事件一
      secondEvent:'mouseout',  //事件二
      activeStyle:'watch-box-active' //激发的样式
    }

    options = $.extend(defaults,options);

    var watchIcon = $('.watch-icon');
    var watchIcon2 = $('.watch-icon2');
    var watchBox = $('.watch-box');

    this.each(function(){
       var timer;
       var _this = $(this);
       _this.find(options.childrenNodeOne).bind(options.firstEvent,function(){
            $(options.childrenNodeTwo).show();
            watchIcon.addClass('watch-icon-active');
            watchIcon2.addClass('watch-icon2-active');
            watchBox.addClass('watch-box-active');
       }).bind(options.secondEvent,function(){
        var _this = $(this);
        timer = setTimeout(function(){
           $(options.childrenNodeTwo).hide();
            watchIcon.removeClass('watch-icon-active');
            watchIcon2.removeClass('watch-icon2-active');
            watchBox.removeClass('watch-box-active');
        },1000);
       });

      _this.find(options.childrenNodeTwo).bind(options.firstEvent,function(){
        clearTimeout(timer);

        $(this).show();
        watchIcon.addClass('watch-icon-active');
        watchIcon2.addClass('watch-icon2-active');
        watchBox.addClass('watch-box-active');
      }).bind(options.secondEvent,function(){
        $(this).hide();
        watchIcon.removeClass('watch-icon-active');
        watchIcon2.removeClass('watch-icon2-active');
        watchBox.removeClass('watch-box-active');
      });

    });
    return this;
  }

})(jQuery);



//tab切换
;(function($){
  $.fn.tabShow=function(options){  
    var defaults = {
      firstEvent:'mouseover', //切换事件
      secondEvent:'mouseout',
      activeStyle:'active-style2', //激发的样式
      btnNode:'.splendid-tab', //li的父级
      contentNode:'.splendid-content', //内容节点
      switchover:true,  //切换添加激活状态形式
      addNode:'<i></i>',
      addNodeTag:'i'
    }
    options = $.extend(defaults,options);
    this.each(function(){
      var _this = $(this);
      var timer;
      //最顶层找li的父级再查找其子节点
      _this.find(options.btnNode).children().bind(options.firstEvent,function(){
        var thisIndex = $(this).index();
        //启动延时
        timer = setTimeout(function(){
        if (options.switchover) {
        _this.find('li').eq(thisIndex).addClass(options.activeStyle).siblings().removeClass(options.activeStyle);
        }else{
        _this.find('li').eq(thisIndex).addClass(options.activeStyle).siblings().removeClass(options.activeStyle);
        _this.find('li').eq(thisIndex).append(options.addNode).siblings().find(options.addNodeTag).remove();
        }
        _this.find(options.contentNode).children().eq(thisIndex).show().siblings().hide();
        },300);

      });
      //鼠标移开的时候关闭定时器
      _this.find(options.btnNode).children().bind(options.secondEvent,function(){
        clearTimeout(timer);
      });

    });    
    return this;
  }
})(jQuery);


/* 图片展示 */
;(function($){
  $.fn.showPhotos=function(options){

    var defaults = {
      leftBtn:'.go-left-btn',//左按钮
      rightBtn:'.go-right-btn', //右按钮
      rollNode:'.dcb-show-pic',//滚动的节点
      firstEvent:'click',
      leftBtnCripple:'leftBtnCripple',//当内容不再有的时候left按钮残废
      rightBtnCripple:'rightBtnCripple'//当内容不再有的时候right按钮残废
    }
    options = $.extend(defaults,options);
    this.each(function(){
      //_this指的是最顶层的夫级元素
    var _this = $(this);
    var ul = _this.find(options.rollNode);
    var li = _this.find(options.rollNode).children();
    var liVisibleNum = 5;
    var num = 0;
    var liWidthAndMargin,ulLeftNum,marginLeftNum;

    //当浏览器缩小的时候
    function winSmall(){
      var winWidth = $(window).width();
      if (winWidth <= 1200) {
       liVisibleNum  = 4;
       marginLeftNum = 0;
       liWidthAndMargin = parseInt(li.eq(0).width()) + 10;
      }else{
       liVisibleNum  = 5;
       marginLeftNum = 18;
       liWidthAndMargin = parseInt(li.eq(0).width()) + 18;
      }
    }
    
    winSmall();
    $(window).resize(function(){
      num = 0;
      ul.animate({'left':0}, 1000);
      winSmall();
      $(options.leftBtn).removeClass(options.leftBtnCripple);
      $(options.rightBtn).removeClass(options.rightBtnCripple);
    });

    //获得总得宽度，让div能撑开
    var ulWidth =  ( liWidthAndMargin ) * li.length;
    //ul的宽度
    _this.find(options.rollNode).width(ulWidth);
    //超出的宽度来滚动
    var beyondWidth = ulWidth - _this.width();
    
    var ulLeftNum = parseInt(ul.css('left'));

    //预先判断是否已经到顶了
    if (ulLeftNum < 0) {
        $(options.rightBtn).addClass(options.rightBtnCripple);
    }else{
        $(options.rightBtn).removeClass(options.rightBtnCripple);
    }
    //左按钮点击的时候
    $(options.rightBtn).bind(options.firstEvent,function(){
      ulLeftNum = parseInt(ul.css('left'));
      //当它不在运动的时候我才执行它
      if (!ul.is(':animated')) {
        if ( ulLeftNum > -beyondWidth+marginLeftNum+2) {
          num++;
          ul.animate({'left':-(liWidthAndMargin * liVisibleNum)*num +'px'}, 800);
          $(options.leftBtn).removeClass(options.leftBtnCripple);
        }else{
          $(this).addClass(options.rightBtnCripple);
        }
      }

    });
   

    //预先判断是否已经到顶了
     if ( ulLeftNum > -beyondWidth ) {
      $(options.leftBtn).addClass(options.leftBtnCripple);
    }else{
      $(options.leftBtn).removeClass(options.leftBtnCripple);
    }

    //右按钮点击的时候
    $(options.leftBtn).bind(options.firstEvent,function(){
      ulLeftNum = parseInt(ul.css('left'));
       if (!ul.is(':animated')) {
        if ( ulLeftNum < 0 ) {
          num--;
          ul.animate({'left':-(liWidthAndMargin * liVisibleNum)*num +'px'}, 800);
          $(options.rightBtn).removeClass(options.rightBtnCripple);
        }else{
          $(this).addClass(options.leftBtnCripple);
        }
       }
    });

    });
    
    return this;
  }
})(jQuery);


//点击添加样式
;(function($){
  $.fn.addStyle = function(options){
    var defaults = {
      firstEvent:'click',
      childrenNode:'li',
      addStyle:'active-style6'
    }
    options = $.extend(defaults,options);
    this.each(function(){
      var _this = $(this);
      _this.children(options.childrenNode).bind(options.firstEvent,function(){
        $(this).addClass(options.addStyle).siblings(options.childrenNode).removeClass(options.addStyle);
      });
    });
    return this;
  }
})(jQuery);

/**
 * [ xDialog 对话框 ]
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function($){
    $.extend($.fn, {
        xDialog: function(opt){
            var def = $.extend({
                /*
                 *@type 消息框类型 
                 *html: 页面上现有HTML代码 
                 *message: 普通的对话框
                 *warn: 警告框  
                 *confirm: 消息确认框 
                 *ifarme|200|300: iframe内容|iframe宽|iframe高
                 *ajax|get/post: ajax内容|ajax提交数据方式get/post
                 */
                type: 'html',
                objElem: $('#xDialogBox'), //HTML对话框的元素 type='html'时才有效
                title: '对话框标题', //对话框标题
                content: '对话框内容', //内容 支持HTML
                url: null, //iframe/ajax的URL type='iframe/ajax'时必填
                mask: true, //是否有遮罩层  默认true
                maskClick: true, //点击遮罩层是否关闭  默认true
                maskColor: '#000', //遮罩层的颜色
                maskOpacity: '0.5', //遮罩层的透明度
                drag: true, //是否可以拖动
                timeOut: 0, //是否延时关闭
                confirmCallback: null, //确定时的回调函数
                closeCallback: null //关闭时的回调函数
            }, opt);

            //判断是否IE6
            var isIE6 = (($.browser.msie && $.browser.version == 6.0) ? true : false), 
                self = this, //把this传给self保存起来
                dBody = document.body,
                docBody = $(dBody),                
                dElem = document.documentElement;

            if(def.objElem != null){
                def.objElem = (typeof def.objElem == 'string' ? $(def.objElem) : def.objElem);
            }

            //获取窗口的宽高
            var getDoc = function(){
                return {
                    h: Math.max(dElem.scrollHeight, dElem.clientHeight),
                    w: Math.max(dElem.scrollWidth, dElem.clientWidth)
                }
            }
            //防止选中文字
            $.fn.noSelect = function(p){
                var prevent = (p == null) ? true : p;
                if (prevent) {
                    return this.each(function(){
                        if ($.browser.msie || $.browser.safari) 
                            $(this).bind('selectstart', function(){
                                return false;
                            });
                        else 
                            if ($.browser.mozilla) {
                                $(this).css('MozUserSelect', 'none');
                                $('body').trigger('focus');
                            }
                            else 
                                if ($.browser.opera) 
                                    $(this).bind('mousedown', function(){
                                        return false;
                                    });
                                else 
                                    $(this).attr('unselectable', 'on');
                    });
                }
                else {
                    return this.each(function(){
                        if ($.browser.msie || $.browser.safari) 
                            $(this).unbind('selectstart');
                        else 
                            if ($.browser.mozilla) 
                                $(this).css('MozUserSelect', 'inherit');
                            else 
                                if ($.browser.opera) 
                                    $(this).unbind('mousedown');
                                else 
                                    $(this).removeAttr('unselectable');
                    });
                }
            };
            //生成对话框模板
            var buildTPL = function(){
                var tpl = '<div class="xdia-box"><table class="xdia-box-table"><tr class="side"><td class="lt"></td><td class="tt"></td><td class="rt"></td></tr><tr><td class="sb"></td><td class="xdia-head"><h2 rel="xdiaDrag" class="xdia-title"></h2><a class="xdia-close" rel="xdiaClose">close</a></td><td class="sb"></td></tr><tr><td class="sb"></td><td class="xdia-content"> <div class="xdia-body"></div></td><td class="sb"></td></tr><tr><td class="sb"></td><td class="xdia-footer"><div class="xdia-foot"><a class="xdia-btn xdia-btn-confirm" rel="xdiaConfirm">确定</a><a class="xdia-btn xdia-btn-close" rel="xdiaClose">取消</a></div></td><td class="sb"></td></tr><tr class="side"><td class="lb"></td><td class="bb"></td><td class="rb"></td></tr></table></div>';
                tpl = $(tpl);
                return {
                    tpl: tpl, 
                    head: tpl.find('.xdia-head'),
                    body: tpl.find('.xdia-body'),
                    foot: tpl.find('.xdia-foot')
                }
            }

            // 生成遮罩层
            var buildMask = function(){
                var height,position,docSize=getDoc();
                if(!$('.xdialog-mask-wrap')[0]){
                    var maskWrap = $('<div/>').addClass('xdialog-mask-wrap');
                    if(isIE6){
                        var maskIframe = $('<iframe src="javascript:;">').addClass('xdialog-mask-iframe');
                        maskIframe.css({
                            height:docSize.h,
                            opacity:0
                        });
                        maskIframe.appendTo(maskWrap);
                    }

                    height = "100%";
                    position = "fixed";
                    if (isIE6) {
                        height = docSize.h;
                        position = "absolute";
                    }

                    maskWrap.css({
                        top: 0,
                        left: 0,
                        width: '100%',
                        height: height,
                        position: position,
                        zIndex: 998,
                        backgroundColor: def.maskColor,
                        opacity: def.maskOpacity
                    });
                    maskWrap.appendTo(docBody);
                }
                else{
                    $('.xdialog-mask-wrap').show();
                    var maskWrap = $('.xdialog-mask-wrap');
                }
                if(def.maskClick){
                    maskWrap.bind('click',function(){
                        bindEvent.closeFun();
                    });
                }
                //把遮罩层传给全局
                self.maskWrap = maskWrap;
            }

            //居中对话框
            var setCenter = function(){
                if(isIE6) def.objElem.css('float','left'); //修正IE6下面无法居中
                var clineHeight = dElem.clientHeight,
                    left,top,                   
                    cWidth = def.objElem.outerWidth(),
                    cHeight = def.objElem.outerHeight(),
                    pWidth = docBody.outerWidth(),
                    pHeight = docBody.outerHeight(),
                    scrollTop = $(document).scrollTop();

                if(cHeight >= clineHeight){
                    var height = clineHeight - def.objElem.find('.xdia-head').height() - def.objElem.find('.xdia-foot').height()- 60;
                    def.objElem.find('.xdia-body').css({
                        height: height,
                        overflow: 'auto',
                        'overflow-x': 'hidden'
                    });
                    cHeight = def.objElem.outerHeight();
                }

                var rTop = scrollTop <=50 ? ((clineHeight - cHeight) / 2) : (scrollTop + 50);
                //top = $(document).scrollTop() + (clineHeight / 2.5) - (cHeight / 2 );
                top = rTop ;
                left = (pWidth - cWidth) / 2;
                def.objElem.css({
                    position:'absolute',
                    zIndex:999,
                    left:left,
                    top:top
                });
            }

            //绑定事件
            var bindEvent = {
                btnEvent: function(type){
                    def.objElem.find('[rel=xdiaConfirm]').bind('click',function(){
                        if(def.confirmCallback){
                            def.confirmCallback();
                        }
                        bindEvent.closeFun();
                        return false;
                    });
                    def.objElem.find('[rel=xdiaClose]').bind('click',function(){
                        bindEvent.closeFun();
                        return false;
                    });
                },
                closeFun: function(){
                    if($(self.maskWrap)[0]){
                        self.maskWrap.remove();
                    }
                    if(def.closeCallback){
                        def.closeCallback();
                    }
                    if(def.type != 'html'){def.objElem.remove();}
                    else{def.objElem.hide();}
                    
                }
            }

            //显示对话框
            var showBox = function(type){
                var dialog = buildTPL();
                def.objElem = dialog.tpl;
                dialog.head.find('.xdia-title').html(def.title);
                dialog.body.html(def.content);
                switch (type) {
                    case 'message':
                        dialog.foot.hide();
                        break;
                    case 'warn':
                        dialog.foot.find('.xdia-btn-close').hide();
                        break;
                    case 'iframe':
                        var item = $.trim(def.type).split('|'),
                            w = item[1] || 300,
                            h = item[2] || 300;
                        dialog.body.html('<iframe class="xdia-content-iframe" src="' + def.url + '" frameBorder="0" name="xdiaDialogFrame" width="'+w+'" height="'+h+'"></iframe>');
                        break;
                    case 'ajax':
                        var item = $.trim(def.type).split('|');
                        dialog.body.html('<div class="xdia-ajax-loading">loading...</div>');
                        getAjax();
                        break;
                    default:
                        break;  
                }
                
                def.objElem.addClass('xdia-type-'+type).appendTo(docBody).show();
                setCenter();
                bindEvent.btnEvent();
            }
            //获取ajax内容
            var getAjax = function(){
                var item = $.trim(def.type).split('|'),
                    urlData = $.trim(def.url).split('?'),
                    html = '';
                if(item[0] != 'ajax') return;
                $.ajax({
                    type: item[1] || 'get',
                    url: urlData[0],
                    data: urlData[1],
                    error: function(){
                        html = '<div class="xdia-ajax-error">error...</div>';
                        def.objElem.find('.xdia-body').html(html);
                    },
                    success: function(data){
                        html = data;
                        def.objElem.find('.xdia-body').html(html);
                    }
                });
            }

            //@HTML
            var showHTML = function(){
                if(!def.objElem[0]) return;
                def.objElem.show();
                setCenter();
                bindEvent.btnEvent();
            }

            // 对话框类型
            var type = $.trim(def.type).split('|');
            switch (type[0]) {
                case 'html':
                    showHTML();
                    break;
                case 'message':
                    showBox('message');
                    break;
                case 'warn':
                    showBox('warn');
                    break;
                case 'confirm':
                    showBox();
                    break;
                case 'iframe':
                    showBox('iframe');
                    break;
                case 'ajax':
                    showBox('ajax');
                    break;
            }
            if(def.mask){
                buildMask();
            }
            if(def.timeOut != 0){
                setTimeout(function(){
                    bindEvent.closeFun();
                }, def.timeOut);
            }

            if(def.drag && def.objElem.find('[rel=xdiaDrag]')[0]){
                var isMouseDown  = false,
                    dragElem = def.objElem,
                    handle = def.objElem.find('[rel=xdiaDrag]'),
                    lastMouseX,lastMouseY,lastElemTop,lastElemLeft,
                    dragPosition = {
                        getMouse: function(e){
                            var posx = 0,
                                posy = 0;
                            if (!e) var e = window.event;

                            if (e.pageX || e.pageY) {
                                posx = e.pageX;
                                posy = e.pageY;
                            }
                            else if (e.clientX || e.clientY) {
                                posx = e.clientX + dBody.scrollLeft + dElem.scrollLeft;
                                posy = e.clientY + dBody.scrollTop  + dElem.scrollTop;
                            }
                            return { 'x': posx, 'y': posy };
                        },
                        update: function(e) {
                            var pos = this.getMouse(e),
                                spanX = (pos.x - lastMouseX),
                                spanY = (pos.y - lastMouseY);
                            def.objElem.css({
                                top: (lastElemTop + spanY),
                                left: (lastElemLeft + spanX)
                            })
                        }
                    };
                $(document).bind('mousemove', function(e){
                    if(isMouseDown){
                        dragPosition.update(e);
                        return false;
                    }
                }).bind('mouseup', function(e){
                    if(isMouseDown){
                        isMouseDown = false;
                        return false;
                    }
                });

                handle.bind('mousedown', function(e){
                    $(this).css('cursor', 'move');
                    dragElem.css({
                        position: 'absolute',
                        zIndex: parseInt(new Date().getTime()/1000)
                    });
                    isMouseDown  = true;
                    var pos = dragPosition.getMouse(e);
                    lastMouseX = pos.x;
                    lastMouseY = pos.y;
                    lastElemTop  = dragElem.offset().top;
                    lastElemLeft = dragElem.offset().left;
                    dragPosition.update(e);
                    docBody.noSelect();
                    $(this).noSelect();
                }).bind('mouseup', function(e){
                    $(this).css('cursor', 'default').noSelect(false);
                    docBody.noSelect(false);
                });
            }
            this.data = bindEvent;
            return this;
        },
        xDialogClose: function(){
            this.data.closeFun();
        }
    });
})(jQuery);

//垂直线条对齐
function allEquality(){
  var brs = $('.brs');
  // var brs2 = $('.brs2');
  var brs3 = $('.brs3');

  var allMoveType =  $('.all-movie-type').height();
  brs.height(allMoveType);
/*
  var searchList = $('.search-list').height();
  brs2.height(searchList);
*/
  var dsjTypeInner = $('.dsj-type-inner').height();
  brs3.height(dsjTypeInner);
}


/* 调整宽度 */
function resizeWindow(){
  
  var win = $(window);
  function resizeWindowTwo(){
  var winWidth = win.width();
  var winScrollLeft = $(window).scrollLeft();
  //当小于等于1200px的时候
   if (winWidth <= 1200) {
     $('body').addClass('width1000');
     $('#banner,.zt-footer').css('width',winWidth+winScrollLeft+'px');
     $('.zt-top-inner,.mhm-menu,.mhs-inner,.container-inner,.zt-footer-inner,.details-head-inner,.details-body').width('');
     }else{
     $('body').removeClass('width1000');
     $('.zt-top-inner,.mhm-menu,.mhs-inner,.container-inner,.zt-footer-inner,.details-head-inner,.details-body').width(1200);
     $('#banner,.zt-footer').css('width','100%');
    }
  }
  resizeWindowTwo();

  win.resize(function(){
    resizeWindowTwo();
  });

  win.scroll(function(){
    resizeWindowTwo();
  });
}


// 调整导航样式
function menuStyle(){
  $('.zt-top').css('border-top','2px solid #ff6a1f');
}





/* 观看记录 */
var cookieFn = {
    set:function(name,value,expires,path,domain){
        if(typeof expires=="undefined"){
            expires=new Date(new Date().getTime()+1000*3600*24*365);
        }
        document.cookie=name+"="+escape(value)+((expires)?"; expires="+expires.toGMTString():"")+((path)?"; path="+path:"; path=/")+((domain)?";domain="+domain:"");
        
    },
    get:function(name){
        var arr=document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
        if(arr!=null){
            return unescape(arr[2]);
        }
        return null;
    },
    clear:function(name,path,domain){
        if(this.get(name)){
        document.cookie=name+"="+((path)?"; path="+path:"; path=/")+((domain)?"; domain="+domain:"")+";expires=Fri, 02-Jan-1970 00:00:00 GMT";
        }
    }
};

cookieFn.clear('_myFavTv');


if(typeof JSON!=='object'){JSON={}}(function(){'use strict';function f(n){return n<10?'0'+n:n}if(typeof Date.prototype.toJSON!=='function'){Date.prototype.toJSON=function(){return isFinite(this.valueOf())?this.getUTCFullYear()+'-'+f(this.getUTCMonth()+1)+'-'+f(this.getUTCDate())+'T'+f(this.getUTCHours())+':'+f(this.getUTCMinutes())+':'+f(this.getUTCSeconds())+'Z':null};String.prototype.toJSON=Number.prototype.toJSON=Boolean.prototype.toJSON=function(){return this.valueOf()}}var cx,escapable,gap,indent,meta,rep;function quote(string){escapable.lastIndex=0;return escapable.test(string)?'"'+string.replace(escapable,function(a){var c=meta[a];return typeof c==='string'?c:'\\u'+('0000'+a.charCodeAt(0).toString(16)).slice(-4)})+'"':'"'+string+'"'}function str(key,holder){var i,k,v,length,mind=gap,partial,value=holder[key];if(value&&typeof value==='object'&&typeof value.toJSON==='function'){value=value.toJSON(key)}if(typeof rep==='function'){value=rep.call(holder,key,value)}switch(typeof value){case'string':return quote(value);case'number':return isFinite(value)?String(value):'null';case'boolean':case'null':return String(value);case'object':if(!value){return'null'}gap+=indent;partial=[];if(Object.prototype.toString.apply(value)==='[object Array]'){length=value.length;for(i=0;i<length;i+=1){partial[i]=str(i,value)||'null'}v=partial.length===0?'[]':gap?'[\n'+gap+partial.join(',\n'+gap)+'\n'+mind+']':'['+partial.join(',')+']';gap=mind;return v}if(rep&&typeof rep==='object'){length=rep.length;for(i=0;i<length;i+=1){if(typeof rep[i]==='string'){k=rep[i];v=str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v)}}}}else{for(k in value){if(Object.prototype.hasOwnProperty.call(value,k)){v=str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v)}}}}v=partial.length===0?'{}':gap?'{\n'+gap+partial.join(',\n'+gap)+'\n'+mind+'}':'{'+partial.join(',')+'}';gap=mind;return v}}if(typeof JSON.stringify!=='function'){escapable=/[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;meta={'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','"':'\\"','\\':'\\\\'};JSON.stringify=function(value,replacer,space){var i;gap='';indent='';if(typeof space==='number'){for(i=0;i<space;i+=1){indent+=' '}}else if(typeof space==='string'){indent=space}rep=replacer;if(replacer&&typeof replacer!=='function'&&(typeof replacer!=='object'||typeof replacer.length!=='number')){throw new Error('JSON.stringify');}return str('',{'':value})}}if(typeof JSON.parse!=='function'){cx=/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;JSON.parse=function(text,reviver){var j;function walk(holder,key){var k,v,value=holder[key];if(value&&typeof value==='object'){for(k in value){if(Object.prototype.hasOwnProperty.call(value,k)){v=walk(value,k);if(v!==undefined){value[k]=v}else{delete value[k]}}}}return reviver.call(holder,key,value)}text=String(text);cx.lastIndex=0;if(cx.test(text)){text=text.replace(cx,function(a){return'\\u'+('0000'+a.charCodeAt(0).toString(16)).slice(-4)})}if(/^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,'@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,']').replace(/(?:^|:|,)(?:\s*\[)+/g,''))){j=eval('('+text+')');return typeof reviver==='function'?walk({'':j},''):j}throw new SyntaxError('JSON.parse');}}}());


var _myFavTv = [];
/* 建立最近使用的视图 */
var buildHtml = function(obj){
    var html = '',
        chap = '';
    if(obj.length == 0){
        html = '<li class="ext">您最近没有观看过电视剧。</li>';
    }
    else{
       for(var i=0;i<obj.length;i++){
            var extstr = '';
            if( obj[i].mv_type == 'dianying'){
                extstr = '重新看';
            }
            else if(obj[i].mv_type == 'zongyi'){
                extstr = '第'+obj[i].num+'期';
            }
            else{
                extstr = '第'+obj[i].num+'集';
            }
            html += '<li><a href="/'+obj[i].mv_type+'/detail-'+obj[i].id+'.html" target="_blank"><span>'+extstr+'</span><div class="history-name">['+obj[i].mv_ch+'] '+obj[i].title+'</div></a><i class="his-del" rel="'+obj[i].id+'"></i></li>';
        } 
    }
    $('#his_list').html(html);

    $('#his_list').find('.his-del').bind('click', function(e){
        e.preventDefault();
        var delID = $(this).attr('rel'),
            myFav = cookieFn.get('_myFavMv');
        myFav = eval('('+myFav+')');
        newArr = reBuildFavArr(myFav, delID);
        buildHtml(newArr);
        cookieFn.set('_myFavMv', JSON.stringify(newArr));
    });
}

var reBuildFavArr = function(arr, key){
    // 只保留前10个使用记录
    if(arr.length >= 10){arr = arr.slice(0, 9);}
    for(var i=0;i<arr.length;i++){
        if(arr[i].id == key){
            arr.splice(i, 1);
            break;
        }
    }
    return arr;
}

var optFavTool = function(obj){
    var oneTool = obj,
        newArr,
        myFav = cookieFn.get('_myFavMv');
    myFav = eval('('+myFav+')');
    newArr = reBuildFavArr(myFav, oneTool.id);
    newArr.unshift(oneTool);
    buildHtml(newArr);
    cookieFn.set('_myFavMv', JSON.stringify(newArr));
}


if($('#drop_histroy').get()){
    $('#del_history').click(function(e){
        e.preventDefault();
        var myFav = [];
        cookieFn.set('_myFavMv', JSON.stringify(myFav));
        buildHtml(myFav);
    });
    $('#all_pagination a[data-num], #dy_cource a, #go_play').live('click',function(){

        var _self = $(this);
        var curClickNum = _self.attr('data-num');

        if($('#xDialogBox').get(0)){
          $.fn.xDialog({
              type: 'html'
          });
        }
        var mv_type,mv_ch;
        switch(parseInt(mv_info['type'])){
            case 1:
                mv_type = 'dianying';
                mv_ch = '电影';
                break;
            case 2:
                mv_type = 'dianshiju';
                mv_ch = '电视剧';
                break;
            case 3:
                mv_type = 'dongman';
                mv_ch = '动漫';
                break;
            case 4:
                mv_type = 'zongyi';
                mv_ch = '综艺';
                break;
            default:
                mv_type = 'dianying';
                mv_ch = '电影';
                break;
        }
        
        if(curClickNum != undefined && curClickNum != 0){
            mv_info['num'] = curClickNum;
        }
        mv_info['mv_type'] = mv_type;
        mv_info['mv_ch'] = mv_ch;
        optFavTool(mv_info);     
    });
    
}

 /* 83133图片文字植入 */
var cb83133 = function(data){
   if(!data.length) return;
    var imgStr = '<ul class="qoc-pic clearfix">',
        len = data.length;
    if(len > 10) len = 10;
    for(var i=0;i<len;i++){
        imgStr += '<li><a class="white" href="'+data[i].url+'"><img src="'+data[i].thumb+'" /><span class="tit">'+data[i].title+'</span><i class="bg"></i></a>';
    }
    imgStr += '</ul>';

    $('#advert-show').html(imgStr);
}

var addCd83133 = function(){
    $.getScript('/www.83133.com/api/999datacb83133.js');
}




$(function(){
   
  //到一定程度的时候才添加 /www.83133.com/api/999datacb83133.js 这些数据
  if ($('#advert-show').get(0)) {
   var advertShow = $('#advert-show');
   var advertShowTop =  advertShow.offset().top;
   var cdSwitch = 0;
   
   function cdFun(){
     if ($(window).scrollTop() > advertShowTop - 900 ) {
           cdSwitch++;
       if (cdSwitch == 1) {
           addCd83133();
       }
     }
   }
      cdFun();
   $(window).scroll(function(){
      cdFun(); 
   })
  }

$('.fav-ico').click(function(){
  addFav();
});

  /* 初始化最近使用的数据 */
  var myFav = cookieFn.get('_myFavMv');
  if(myFav == undefined){
      myFav = _myFavTv;
      cookieFn.set('_myFavMv', JSON.stringify(myFav));
  }
  else{myFav = eval('('+myFav+')');}

  buildHtml(myFav);
  cookieFn.set('_myFavMv', JSON.stringify(myFav));

  if(mv_info != false){
    for(var i=0;i<myFav.length;i++){
        if(myFav[i].id == mv_info.id){
            $('.last-time').html('<i class="tag"><b>您上次看到'+myFav[i].num+'集</b><em class="tragl"></em></i>');
        }

    }
  }
  
    //tab切换
    $('.splendid').tabShow();
    $('.teleplay-left').tabShow({
      btnNode:'.splendid-tab', //li按钮节点
      contentNode:'.teleplay-content' //内容节点
    });
   
    $('.program-content').tabShow({
      btnNode:'.week', //li按钮节点
      // activeStyle:'active-style2', //激发的样式
      contentNode:'.advance-notice' //内容节点
    });
    
    $('.select-source-list').find('li').bind('click', function(){
        $(this).addClass('active-style12').siblings().removeClass('active-style12');
    });

    $('.details-con2-list .btn').find('a').live('click', function(e){
        e.preventDefault();
        var self = $(this),
            allNum = self.attr('re'),
            sta = self.attr('sta'),
            hideItem = $('.details-con2-list').find('li[rel="h"]');
        if(sta == undefined || sta == 0){
            hideItem.show();
            self.text('收起');
            self.attr('sta', 1);
        }
        else{
            hideItem.hide();
            self.text('查看全部'+allNum+'集');
            self.attr('sta', 0);
        }

    });
   
   $('.details-con3').tabShow({
      activeStyle:'active-style8', //激发的样式
      btnNode:'.fch1', //li的父级
      contentNode:'.details-con3-body', //内容节点
      switchover:false  //切换添加激活状态形式
   });

    //轮播图
    $('#banner').bigFigure({
      figureBtnEvent:'mouseover',
      showButton: false
    });

    //滑动菜单
    $('.nhm-menu-ul').eq(0).slideMenu();

    //大于的时候添加颜色
    $('.tcl1,.tcl2,.tcl3,.tcl4').beyondNum();
    $('.rsa-list').beyondNum({
      node:'.movie-headline9',
      activeClass:'active15'

    });

    //调用展示更多
    $('.watch-record').showMoreTwo();

   
   //展示更多图片
   $('.dcb-show-pic-wrap').showPhotos();

    //调用调整宽度
    resizeWindow();

    //调整导航样式
    //menuStyle();

   //垂直线条对齐调用
    allEquality();
    
    //调用图片延时加载
    $(".scrollLoading").scrollLoading();

   
    //分类检索添加样式
    $('.filtrate-nav').addStyle();

     //模拟滚动条调用
    $('.scroll-pane').jScrollPane();
    $('.scroll-pane-arrows').jScrollPane({
      showArrows:true,horizontalGutter:10
     });


  //点击展开显示更多
  if ($('.synopsis-article').get(0)) {
  //获取其内容
  var synopsis = $('.synopsis-article');
  var synopsisHtml = synopsis.html();
  var synopsisLen = synopsisHtml.length;
  var num = 0;
  var unfold = '... <a class="unfold-btn" href="javascript:;">展开&gt;&gt;</a>';
  var packUp = ' <a class="unfold-btn" href="javascript:;">收起&gt;&gt;</a>';
  var detailsContent =  $('.details-content');
  //如果大于这个数的话更多按钮才显示.
  if ( synopsisLen > 120 ) {
    var result =  synopsisHtml.substr(0,120);
    synopsis.html(result + unfold);
  }
      //展开按钮
     var btn = $('.unfold-btn');
      btn.live('click',function(){
        num++;
      if ( num%2 == 0 ) {
         synopsis.html(result + unfold);
         /*synopsis.css('margin-bottom','');
         detailsContent.css('height','');*/
          }else{
         synopsis.html(synopsisHtml+packUp);
         /*synopsis.css('margin-bottom','61px');
         detailsContent.css('height','auto');*/
       }
     });
  };




//搜索框下拉更多
if ($(".search-text1").get(0)) {

    var searchList = $('.search-list');
    var searchText =  $(".search-text1");
    var searchListUl = $('#search-list-ul');
    var slrInner = $('#slr-inner');
    var searchListLeft = $('.search-list-left');
    var searchListRight = $('.search-list-right');
    var timer , dataText , keyNum = 0;

    function lineHeight(){
    //获取左右高度来定线;
        var leftHeight = searchListLeft.height();
        var rightHeight = searchListRight.height();
        if ( leftHeight > rightHeight ) {
         searchListRight.removeClass('bls');
         searchListLeft.addClass('brs2');
        }else{
         searchListRight.addClass('bls');
         searchListLeft.removeClass('brs2');
        }
    }

    searchText.bind('keyup',function(event){

           //获得输出的li数据的个数
           var searchListLiLen = $('#search-list-ul li').length;
           
           //keyNum数据函数
           function keyNumDataFun(){
             //keyNum为多少的时候那么就当前的添加样式
            $('#search-list-ul li').eq(keyNum).addClass('searchListUl').siblings().removeClass('searchListUl');
                //按上下键的时候对应相应的数据
                var keyNumData = '<a class="slr-inner-pic" href="' + dataText[keyNum].url + '"><img src="' + dataText[keyNum].image + '" width="140" height="190px"/></a><p>' + dataText[keyNum].type + '</p><p class="actor-name">' + dataText[keyNum].actor + '</p><p>' + dataText[keyNum].mv_year + '年</p>';
                    slrInner.html(keyNumData);
                //搜索框显示上下键搜索的名字
                searchText.val(dataText[keyNum].mv_name);  
            }
           
           //上键选择的时候
           if(event.keyCode == 38){

                if ( keyNum == 0 ) {
                     keyNum = searchListLiLen - 1;
                }else{
                     --keyNum;
                }

                keyNumDataFun();
            
            //下键选择的时候
            }else if(event.keyCode == 40){

                if ( keyNum == searchListLiLen - 1 ) {
                     keyNum = 0;
                }else{
                     ++keyNum;
                }

                keyNumDataFun();       

            }else{

           //清除延时
           clearTimeout(timer);
           //先清空内容
           searchListUl.html('');
           //获取当前的val值来拉升数据
           var thisVal = $(this).val();
           if (thisVal == '') {
            searchList.hide();
            return;
           }
        
            $.ajax({
                type : "GET",
                url : "/?ct=search&ac=getq&q="+thisVal,
                dataType : "jsonp",
                jsonp: 'callback',
                success : function(data){

                //获得data数据让上下键控制的时候好获取
                dataText = data;
               //获取对象的个数
               var dataLen = data.length;   
               if (dataLen == 0 || thisVal == '') {
                searchList.hide();
               }else{
                searchList.show();
              
                //遍历所有的对象内容插入到相应内容中
                var mvLi = '';

                 for(var i = 0 ; i < 10 ; i++){
                  //当名字为空的时候那么就显示为其它;
                    mvLi += '<li><a href="' + data[i].url + '"><em class="mvName">' + data[i].mv_name + '</em><span>' + ( data[i].type == null ? data[i].type = '其它' :  data[i].type ) + '</span></a><i></i></li>';

                    searchListUl.html(mvLi);
                    //第一个先得到显示
                    var slrInnerFirst = '<a class="slr-inner-pic" href="' + data[0].url + '"><img src="' + data[0].image + '" width="140" height="190px"/></a><p>' + data[0].type + '</p><p class="actor-name">' + data[0].actor + '</p><p>' + data[0].mv_year + '年</p>';
                    slrInner.html(slrInnerFirst);

                    //鼠标触发的时候执行的动作
                    searchListUl.children().on('mouseover',function(){

                      $(this).addClass('searchListUl').siblings().removeClass('searchListUl');
                      //对应的索引
                      var thisIndex = $(this).index();
                      //搜索框显示对应的名字
                      searchText.val(dataText[thisIndex].mv_name);  
                      //keyNum要同步
                      keyNum = thisIndex;
                      //显示右边的内容
                      var slrInnerChild = '<a class="slr-inner-pic" href="'+ data[thisIndex].url + '"><img src="' + data[thisIndex].image + '" width="140" height="190"/></a><p>' + data[thisIndex].type +'</p><p class="actor-name">'+ data[thisIndex].actor +'</p><p>'+ data[thisIndex].mv_year + '年</p>'
                      slrInner.html(slrInnerChild);
                      //调用等高度线条
                      lineHeight();

                    });

                    //第一个添加样式
                    $('#search-list-ul li:first-child').addClass('searchListUl');
                    //当重新输出的时候，那么 keyNum 再次归零
                    keyNum = 0;

                  }
               }
            }
        })

    }
  

    }).bind('blur',function(){
        //鼠标聚焦离开的时候来个延时
        timer = setTimeout(function(){
         searchList.hide(); 
        },200)

      }).bind('focus',function(){
        //调用线条相等高度
        lineHeight();

      });


}//搜索框下拉更多结束符



/* 直播频道播放内容 */
if ($('.live-right-list').get(0)) {

  var liveLeftList = $('.live-left-list');
  var liveVideoPlay = $('.live-video-play');
  var liveListWrap = $('.live-list-wrap');
  var zhiboGuanggao = $('.live-con-right .test-300');

  //点击直播列表的时候
  $('.live-right-list li a').click(function(){
     $(this).addClass('live-play-active').parents().siblings().children().removeClass('live-play-active');
     liveLeftList.hide();
     liveVideoPlay.show();
     liveListWrap.show();
     zhiboGuanggao.show();
     return false;
  });

  //下面列表点击的时候
  $('.showTvBa').click(function(){
     liveLeftList.hide();
     liveVideoPlay.show();
     liveListWrap.show();
     zhiboGuanggao.show();
     return false;
  })

  //点击关闭按钮的时候
  $('.close-video-btn').click(function(){
    $('.live-right-list li a').removeClass('live-play-active');
    $('#live-video-play').children('embed').remove();
    liveLeftList.show();
    liveVideoPlay.hide();
    liveListWrap.hide();  
    zhiboGuanggao.hide();

    //清空子元素节点
    $('.lpl-list').children().remove();
  });

  $('.lcl-body-list li:first-child').find('.lcl-name').addClass('lpl-name-show');
  $('.lcl-body-list li:first-child').find('.lpl-play').addClass('lpl-play-show');
}



/* 直播页节目选择的时候显示相应的内容 */
if ($('#live-list').get(0)) {
  
  $('.showTvBa').click(function(){
    //先清空在添加
    $('.lpl-list').children().remove();
    $('#live-video-play').children('embed').remove();
    //获得当前a标签的href来显示对应的那个节目
    var thisAttr = $(this).attr('href');
    var thisAttrLen = thisAttr.length;
    //获得最终数字来改变内容
    var thisAttrResult = thisAttr.substr(1,thisAttrLen);

    //切换对应的电视节目
    var TvVideo = $('<embed wmode="direct" flashvars="vid='+ thisAttrResult +'&amp;sktype=live&amp;funCnlInfo=TenVideo_FlashLive_GetChannelInfo&amp;funTopUrl=TenVideo_FlashLive_GetTopUrl&amp;funLogin=TenVideo_FlashLive_IsLogin&amp;funOpenLogin=TenVideo_FlashLive_OpenLogin&amp;funSwitchPlayer=TenVideo_FlashLive_SwitchPlayer&amp;txvjsv=2.0&amp;showcfg=1&amp;share=1&amp;full=1&amp;autoplay=1&amp;p=true" src="/imgcache.qq.com/minivideo_v1/vd/res/TencentPlayerLive.swf?max_age=86400&amp;v=20140714" quality="high"  bgcolor="#000000" width="100%" height="400px" align="middle" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" pluginspage="/get.adobe.com/cn/flashplayer/">');
    
    $('#live-video-play').append(TvVideo);

    $.getJSON('/?ct=ajax&ac=getJiemu&id=' + thisAttrResult , function(data){
       
      //i为索引来匹配
      $.each(data, function(i) {
             if ( i == 0 ) {
              var lplName = $('<li> <a href="#"> <div class="lpl-list-child"><i class="lpl-play lpl-play1 lpl-play-show fl"></i><div class="lpl-name lpl-name-show fl">'+ data[i].tm +' '+ data[i].pn +'</div><div class="playing playing-show fr">正在播放</div></div> </a> </li>');
             }else{
              var lplName = $('<li><div class="lpl-list-child"><i class="lpl-play lpl-play1 fl"></i><div class="lpl-name fl">'+ data[i].tm +' '+ data[i].pn +'</div><div class="playing fr">正在播放</div></div></li>');
             }
             //把数据添加到容器中
             $('#lpl-list').append(lplName);
          })
      });

     var thisSpanHtml = $(this).parents('.lcl-body').siblings('.lcl-head').find('.liveTvName').html();
     $('.tvName').children('span').html(thisSpanHtml);

  });


  var liveListLiA =  $('#live-list li a');

  liveListLiA.click(function(){
    //先清空在添加
    $('.lpl-list').children().remove();
    $('#live-video-play').children('embed').remove();
    //获得当前a标签的href来显示对应的那个节目
    var thisAttr = $(this).attr('href');
    var thisAttrLen = thisAttr.length;
    //获得最终数字来改变内容
    var thisAttrResult = thisAttr.substr(1,thisAttrLen);

    //切换对应的电视节目
    var TvVideo = $('<embed wmode="direct" flashvars="vid='+ thisAttrResult +'&amp;sktype=live&amp;funCnlInfo=TenVideo_FlashLive_GetChannelInfo&amp;funTopUrl=TenVideo_FlashLive_GetTopUrl&amp;funLogin=TenVideo_FlashLive_IsLogin&amp;funOpenLogin=TenVideo_FlashLive_OpenLogin&amp;funSwitchPlayer=TenVideo_FlashLive_SwitchPlayer&amp;txvjsv=2.0&amp;showcfg=1&amp;share=1&amp;full=1&amp;autoplay=1&amp;p=true" src="/imgcache.qq.com/minivideo_v1/vd/res/TencentPlayerLive.swf?max_age=86400&amp;v=20140714" quality="high"  bgcolor="#000000" width="100%" height="400px" align="middle" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" pluginspage="/get.adobe.com/cn/flashplayer/">');
    
    $('#live-video-play').append(TvVideo);

    $.getJSON('/?ct=ajax&ac=getJiemu&id=' + thisAttrResult , function(data){
       
        //i为索引来匹配
        $.each(data, function(i) {
             if ( i == 0 ) {
              var lplName = $('<li> <a href="#"> <div class="lpl-list-child"><i class="lpl-play lpl-play1 lpl-play-show fl"></i><div class="lpl-name lpl-name-show fl">'+ data[i].tm +' '+ data[i].pn +'</div><div class="playing playing-show fr">正在播放</div></div> </a> </li>');
             }else{
              var lplName = $('<li><div class="lpl-list-child"><i class="lpl-play lpl-play1 fl"></i><div class="lpl-name fl">'+ data[i].tm +' '+ data[i].pn +'</div><div class="playing fr">正在播放</div></div></li>');
             }
             //把数据添加到容器中
             $('#lpl-list').append(lplName);
        })

     });

    //点击频道的时候显示对应的名称
    var thisSpanHtml = $(this).children('span').html();
    $('.tvName').children('span').html(thisSpanHtml);

  });
  

}//直播页节目显示相应内容结束符


//如果没有选择的话，那么隐藏那个 您已选择 那么个内容
if ($('.you-select').get(0)) {
   var allFiLiLen = $('.all-fil-ul1').children().length;
   if (allFiLiLen == 0) {
       $('.you-select').html('');
   }else{
       $('.you-select').html('您已选择：');
   }
}

/* 关闭广告 */
$('.btn-test').bind('click', function(){
  $(this).parent('.test-120').hide();
});






/* 顶部浮动定位 */
if ($('.movie-header-search').get(0)) {
   var movieHeaderSearch = $('.movie-header-search'); 
   var headerNav = $('.header-nav');
   var navBtn = $('.nav-btn');
   var searchTxt = $('.search');
   var navContent = $('.nav-content');

   function suspend(){
     //滚动条大于 40
     if ( $(window).scrollTop() > 40 ) {
         movieHeaderSearch.addClass('mhs-position');
         headerNav.show();
         searchTxt.css('margin-left','0');

         headerNav.hover(function() {
           navContent.show();
           navBtn.addClass('mbNone');
         }, function() {
           navContent.hide();
           navBtn.removeClass('mbNone');
         })

     }else{
         movieHeaderSearch.removeClass('mhs-position');
         headerNav.hide();
         searchTxt.css('margin-left','');
     }

   }
   
    suspend();

   //浏览器滚动的时候
   $(window).scroll(function(){
      suspend();
   })
   
  //浏览器缩小的时候
   $(window).resize(function(){
      suspend();
   })

}


/* 广告浮动 */
if ($('#adver').get(0)) {

  var oAdver = $('#adver');
  var oAdverOffsetTop = oAdver.offset().top;
  
  $(window).scroll(function(){

     if ( $(window).scrollTop() > oAdverOffsetTop ) {
        oAdver.addClass('ggxf');
      }else{
        oAdver.removeClass('ggxf');
     }

  }) 

}



if ($('.search-text-share').get(0)) {

   var searchText2 = $('.search-text-share');
   var listData = $('.list-data');
   var listDataUl = $('.list-data-ul');

   var thisVal2 , keyNum2 = 0 , dataLen2 , data2 , timer4;

   searchText2.keyup(function(event){

    clearTimeout(timer4);

    thisVal2 = $(this).val();
    //上键选择的时候
     if(event.keyCode == 38){
      
      if ( keyNum2 == 0 ) {
           keyNum2 = dataLen2 - 1;
      }else{
           --keyNum2;
      }

    listDataUl.children('li').eq(keyNum2).addClass('listData2Cur').siblings().removeClass('listData2Cur');
    searchText2.val(data2[keyNum2].mv_name);
  //下键选择的时候
  }else if(event.keyCode == 40){

      if ( keyNum2 == dataLen2 - 1 ) {
           keyNum2 = 0;

      }else{
           ++keyNum2;
      }
    listDataUl.children('li').eq(keyNum2).addClass('listData2Cur').siblings().removeClass('listData2Cur');
    searchText2.val(data2[keyNum2].mv_name);
    }else{

      $.ajax({
            type : "GET",
            url : "/?ct=search&ac=getq&q="+thisVal2,
            dataType : "jsonp",
            jsonp: 'callback',
            success : function(data){
               data2 = data;
               dataLen2 = data.length;   
               if (dataLen2 == 0 || thisVal2 == '') {
                listData.hide();
               }else{

                listData.show();

                var listLi = '';
                for(var i = 0 ; i < 10 ; i++){
                    listLi += '<li><a href="'+ data[i].url +'">'+ data[i].mv_name +'</a></li>';
                }
                //添加到容器里
                listDataUl.html(listLi);
                //第一个添加样式
                listDataUl.children('li').eq(0).addClass('listData2Cur');
                listDataUl.children('li').bind('mouseover',function(){
                  keyNum2 = $(this).index();
                  $(this).addClass('listData2Cur').siblings('li').removeClass('listData2Cur');
                  var thisChildHtml = $(this).children('a').html();
                  searchText2.val(thisChildHtml);
                });
              }
             
            }
        });
      }
   })
  
  searchText2.blur(function(){
     timer4 = setTimeout(function(){
        listData.hide();
     },100);
  });

}


/* 去掉底下评论框 */
  if($('#SOHUCS').get(0)){
      $(window).bind('scroll', function(){
          if($('#changyan_floatbar_wrapper').get(0))
          $('#changyan_floatbar_wrapper').hide().remove();
      })
      $('#changyan_floatbar_wrapper').hide().remove();
  }
  


});//总结束符号




//modify show
var embedqq = function(id)
{
  $('.lpl-list').children().remove();
  $('#live-video-play').children('embed').remove();
  var TvVideo = $('<embed wmode="direct" flashvars="vid='+ id +'&amp;sktype=live&amp;funCnlInfo=TenVideo_FlashLive_GetChannelInfo&amp;funTopUrl=TenVideo_FlashLive_GetTopUrl&amp;funLogin=TenVideo_FlashLive_IsLogin&amp;funOpenLogin=TenVideo_FlashLive_OpenLogin&amp;funSwitchPlayer=TenVideo_FlashLive_SwitchPlayer&amp;txvjsv=2.0&amp;showcfg=1&amp;share=1&amp;full=1&amp;autoplay=1&amp;p=true" src="/imgcache.qq.com/minivideo_v1/vd/res/TencentPlayerLive.swf?max_age=86400&amp;v=20140714" quality="high"  bgcolor="#000000" width="100%" height="400px" align="middle" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" pluginspage="/get.adobe.com/cn/flashplayer/">');
    $('#live-video-play').append(TvVideo);
    $.getJSON('/?ct=ajax&ac=getJiemu&id=' + id , function(data){
      //i为索引来匹配
      $.each(data, function(i) {
             if ( i == 0 ) {
              var lplName = $('<li> <a href="#"> <div class="lpl-list-child"><i class="lpl-play lpl-play1 lpl-play-show fl"></i><div class="lpl-name lpl-name-show fl">'+ data[i].tm +' '+ data[i].pn +'</div><div class="playing playing-show fr">正在播放</div></div> </a> </li>');
             }else{
              var lplName = $('<li><div class="lpl-list-child"><i class="lpl-play lpl-play1 fl"></i><div class="lpl-name fl">'+ data[i].tm +' '+ data[i].pn +'</div><div class="playing fr">正在播放</div></div></li>');
             }
             //把数据添加到容器中
             $('#lpl-list').append(lplName);
          })
        //点击频道的时候显示对应的名称
        // var thisSpanHtml = $(this).children('span').html();
        // $('.tvName').children('span').html(thisSpanHtml);
      });
    var liveLeftList = $('.live-left-list');
    var liveVideoPlay = $('.live-video-play');
    var liveListWrap = $('.live-list-wrap');
    //点击直播列表的时候
    // $('.live-right-list li a').click(function(){
       $(this).addClass('live-play-active').parents().siblings().children().removeClass('live-play-active');
       liveLeftList.hide();
       liveVideoPlay.show();
       liveListWrap.show();
       // return false;
    // });
}
