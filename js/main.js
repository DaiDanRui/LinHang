/**
 * Created by raychen on 16/2/16.
 */

$(document).ready(function(){
    $(".sets-2").click(function(){
        $(".right-cover").css({
            "opacity":"0.5",
            "zIndex":"0"
        });
        $(".menu-left").animate({
            width: "45%"
        },"fast");
        $(".menu-left").focus();
    });
    $(".menu-left").blur(function(){
        $(".right-cover").css({
            "opacity":"0",
            "zIndex":"-1"
        });
        $(".menu-left").animate({
            width: "0%"
        });
        $(".menu-left").children(".content").css("display","none");
    });
    $("#ser-1").click(function(){
        $("#con1").css("display","block");
    });
    $("#ser-2").click(function(){
        $("#con2").css("display","block");
    });
    $("#ser-3").click(function(){
        $("#con3").css("display","block");
    });

    $(".img-to-set .img-to-set-2 .img-to-set-3").ready(function(){
        $(".img-to-set").height($(".img-to-set").width());
        $(".img-to-set-2").height($(".img-to-set-2").width());
        $(".img-to-set-3").height($(".img-to-set-3").width());
    });
});

function leftBar_none(){
    $(".right-cover").css({
        "opacity":"0",
        "zIndex":"-1"
    });
    $(".menu-left").animate({
        width: "0%"
    });
    $(".menu-left").children(".content").css("display","none");
}
