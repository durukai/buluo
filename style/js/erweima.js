
function generateQRCode(selector){
    var url = "http://qr.liantu.com/api.php?";
       url += "&text="+encodeURI(location.href);//背景颜色,bg=颜色代码，例如：bg=ffffff
       url += "&bg=fcfcfc";//背景颜色,bg=颜色代码，例如：bg=ffffff
       url += "&fg=000000";//前景颜色,fg=颜色代码，例如：fg=cc0000
       url += "&gc=000000";//渐变颜色,gc=颜色代码，例如：gc=cc00000
       url += "&el=Q";//纠错等级,el可用值：h\q\m\l，例如：el=h
       url += "&w=300";//尺寸大小,w=数值（像素），例如：w=300
       url += "&m=30";//静区（外边距）,m=数值（像素），例如：m=30
       url += "&pt=000000";//定位点颜色（外框）,pt=颜色代码，例如：pt=00ff00
       url += "&inpt=000000";//定位点颜色（内点）,inpt=颜色代码，例如：inpt=000000
       url += "&logo=http://www.91liren.com/images/91liren_logo.png";//logo图片,logo=图片地址，例如：http://www.liantu.com/images/2013/sample.jpg
    $(selector).attr("src",url);
}
 
     
$(function(){

    $("#ewm_btn").click(function(){
        generateQRCode($("#ewm_name"));
        $("#alphaBox").show();
    });
     

    $(".ewm_Img").click(function(){
        $("#alphaBox").hide();
    });
});
