/**
 * Created by Lenovo on 2016/3/7.
 */
$(document).ready(function(){
    $('#collect').click(function() {
        var id = $('#skill_id').val();

        $.ajax({
            type: 'post',
            url: "",
            dataType: 'json',
            data:{collect:$('#collect').val(),id:id},
            success: function(json) {
                switch (json) {
                    case 1: // 收藏成功
                        alert("收藏成功");
                        var num = $('#star_num').val() + 1;
                        $('#star_num').innerHTML(num);
                        break;
                    case 0: // 密码错误
                        alert("收藏失败");
                        break;
                    default:
                        break;
                }
            }
        });
    });
})