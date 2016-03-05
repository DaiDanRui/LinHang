/**
 * Created by Lenovo on 2016/3/4.
 */
$(document).ready(function(){
    $("#new_pwd2").blur(function(){
        var $new_pwd = $("#new_pwd").val();
        var $new_pwd2 = $("#new_pwd2").val();
        if($new_pwd != $new_pwd2){
            //$("#respond").show();
            document.getElementById("respond").style.display = "block";
            //document.getElementById("rset").isDisabled = true;
            $("#reset").attr("disabled", true);


        }else{
            $("#respond").hide();
            //document.getElementById("rset").isDisabled = false;
            $("#reset").attr("disabled", false);
            return true;
        }
    });

    $("#rset").click(function(){
        if ($("#new_pwd").val()==""){
            $("#rset").attr("disabled", true);
        }else
        {
            $("#pwdform").submit();
        }
    });
});

function registerCheck(theId,msg){
    if(document.getElementById(theId).value == "" ){
        window.alert(msg);
        document.getElementById(theId).focus();
        return true;
    }
    return false;
}

function register1(){
    if (registerCheck("user_name","请输入用户名")) {
        alert("请输入用户名");
        return false;
    }
    if (registerCheck("pwd","请输入密码")) {
        return false;
    }
    if (registerCheck("pwd_again","请再次输入密码")) {
        return false;
    }

    alert("ok");
    return true;
}