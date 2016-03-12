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

function checkRegister(){
    var userName = document.getElementById("username").value;
    var pwd = document.getElementById("pwd").value;
    var pwd_again = document.getElementById("pwd_again").value;
    var phone = document.getElementById("phone").value;
    if(userName == "" || userName == null){
        alert("请输入用户名");
        return falese;
    }
    if(pwd == "" || pwd == null){
        alert("请输入密码");
        return false;
    }
    if(pwd_again == "" || pwd_again == null){
        alert("请再次输入密码");
        return falese;
    }
    if(phone == "" || phone == null){
        alert("请输入手机号");
        return false;
    }
    return true;
}



function checkLogin(){
    var userName = document.getElementById("username").value;
    var pwd = document.getElementById("pwd").value;

    if(userName == "" || userName == null){
        alert("请输入用户名");
        return falese;
    }
    if(pwd == "" || pwd == null){
        alert("请输入密码");
        return false;
    }
    return true;
}