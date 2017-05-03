function playzgs() {
    if ($("#play_right").is(":hidden")) {
        $("#play_right").show(500);
        setTimeout(function() {
            $("#playzgs").removeClass("prevBtn").addClass("nextBtn");
        }, 200);
    } else {
        $("#play_right").hide(300);
        setTimeout(function() {
            $("#playzgs").removeClass("nextBtn").addClass("prevBtn");
        }, 400);
    }
}
$(function() {
    $(window).scroll(function() {
        if ($(window).scrollTop() >= 600) {
            $(".MacPlayer").addClass("movie_bot");
        } else {
            $(".MacPlayer").removeClass("movie_bot");
        }
    });
});
$(document).ready(function() {
    $("#shadow").css("height", $(document).height()).hide();
    $(".lightSwitcher").click(function() {
        $("#shadow").toggle();
        if ($("#shadow").is(":hidden")) $(this).html("关灯").removeClass("turnedOff");
        else $(this).html("开灯").addClass("turnedOff");
    });
});
onresize = function() {
    $("#shadow").css("height", $(document).height());
}