$(function () {
    $("<div id='class_gotop' style='position:fixed;right:10px;bottom:10px;z-index:100;display:none;'><a id='class_a_gotop' title='回到顶部' style='display:block;_display:none;height:50px;width:50px;background:url(\"http://v.dianxin.com/template/default/movie/images/go_top.gif\") repeat scroll 0 0 transparent;' href='javascript:'></a></div>").appendTo("body");

  $(window).scroll(

    function () {
      if ($(window).scrollTop() > 200) {
        $("#class_gotop").fadeIn("slow");
      }else{
        $("#class_gotop").fadeOut("slow");
      }
    }
  );

  $("#class_a_gotop").click(function () {
    $("html,body").animate({ scrollTop: 0 }, 600);
  }).hover(
     function () {
       $(this).attr("style", "display:block;_display:none;height:50px;width:50px;background:url('http://v.dianxin.com/template/default/movie/images/go_top.gif') repeat scroll 0 50px transparent;");
     },
    function () {
      $(this).attr("style", "display:block;_display:none;height:50px;width:50px;background:url('http://v.dianxin.com/template/default/movie/images/go_top.gif') repeat scroll 0 0 transparent;");
    }
  );
});