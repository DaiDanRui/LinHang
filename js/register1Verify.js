/**
 * Created by raychen on 16/1/19.
 */

function init(){
    var p1 = document.getElementById("register_err1");
    var p2 = document.getElementById("register_err2");
    var p3 = document.getElementById("register_err3");
    var p4 = document.getElementById("register_err4");
    p1.style.visibility = "hidden";
    p2.style.visibility = "hidden";
    p3.style.visibility = "hidden";
    p4.style.visibility = "hidden";
}

function twiceSame(){
    var p1 = document.getElementById("register_pwd");
    var p2 = document.getElementById("register_pwd_again");
    var p3 = document.getElementById("register_user");

    var c1 = isNull(p3);
    var c2 = isNull(p1);
    var c3 = isNull(p2);

    var err = document.getElementById("register_err4");
    if (!c1&&!c2&&!c3){

        if (p1.value!=p2.value) {
            err.style.visibility = "visible";
            p2.focus();
            return false;
        }
        err.style.visibility = "hidden";
        return true;
    }else{
        err.style.visibility = "hidden";
        return false;
    }
}

function verify(el){
    if (twiceSame()) return true;
    else{
        el.focus();
        return false;
    }
}