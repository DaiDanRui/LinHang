/**
 * Created by raychen on 16/1/19.
 */

function verify(){
    var p1 = document.getElementById("login_user");
    var p2 = document.getElementById("login_pwd");

    var bt = document.getElementById("login_bt");

    var c1 = isNull(p1);
    var c2 = isNull(p2);

    if (!c1&&!c2) {
        bt.value = "true";
        return true;
    }
    else {
        bt.value = "false";
        return false;
    }
}