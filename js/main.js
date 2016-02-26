/**
 * Created by raychen on 16/2/16.
 */

$(document).ready(function(){
    var $p1 = $("#user_name").val();
    var $p2 = $("#pwd_again").val();
    var $p3 = $("#pwd").val();

    $("#next").click(function(){
        if (($p1=="")||($p2=="")||($p3=="")){
            $("#next").removeAttr("href");
        }else
            $("#next").attr("href","Register-2.html");
    });
});