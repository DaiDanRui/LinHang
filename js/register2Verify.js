/**
 * Created by raychen on 16/1/19.
 */
function init(){
    var p5 = document.getElementById("register_err5");
    var p6 = document.getElementById("register_err6");
    p5.style.visibility = "hidden";
    p6.style.visibility = "hidden";
}

function verify(){
    var p1 = document.getElementById("register_stu_id");
    var p2 = document.getElementById("register_name");

    var c1 = isNull(p1);
    var c2 = isNull(p2);

    if (!c1&&!c2) return true;
    else return false;
}