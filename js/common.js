/**
 * Created by raychen on 16/1/19.
 */

function isNull(el){
    var pre = el.id;
    var err;
    switch (pre){
        case "register_user": pre = "用户名"; err = document.getElementById("register_err1");break;
        case "register_pwd": pre = "密码";err = document.getElementById("register_err2");break;
        case "register_pwd_again": pre = "第二次密码";err = document.getElementById("register_err3");break;
        case "register_stu_id": err = document.getElementById("register_err5");break;
        case "register_name": err = document.getElementById("register_err6");break;
    }
    pre = pre+"为空";
    if (el.value == null || el.value=="") {
        err.style.visibility="visible";
        el.focus();
        return true;
    }else{
        err.style.visibility="hidden";
        return false;
    }
}
