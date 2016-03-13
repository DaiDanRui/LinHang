/**
 * Created by Lenovo on 2016/3/13.
 */


jQuery(function(){
    var $ = jQuery,
        $list = $('#fileList'),

        ratio = window.devicePixeRatio || 1,

        thumbnailWidth = 100*ratio,
        thumbnailHeight = 100*ratio,

        uploader;

    uploader = WebUploader.create({
        //auto:true, //选完后自动上传

        swf:'webuploader-0.1.5/Uploader.swf',

        server:'http://', //文件接收端服务器

        pick:'#filePicker',

        accept:{
            title:'Images',
            extensions:'gif,jpg,jpeg,bmp,png',
            mimeTypes:'image/*'
        }
    });

    uploader.on('fileQueued',function(file){
        var $li = $(
                '<div id="' + file.id + '" ' + 'class = "file-item thumbnail">' + '<img>' +
                + '</div>'),
            $info = $('<div class = "info">' + file.name + '</div>'),

            $img = $li.find('img');

        $list.append($info);
        $list.append($li);

        //创建缩略图
        uploader.makeThumb(file,function(error,src){
            if(error){
                $img.replaceWith('<span>不能预览</span>');
                return;
            }
            $img.attr('src',src);
        },thumbnailWidth,thumbnailWidth);

    });


    uploader.on('uploadProgress',function(file,percentage){
        var $li = $('#' + file.id),
            $percent = $li.find('.progress span');

        //避免重复创建
        if (!$percent.length){
            $percent = $('<p class="progress"><span></span></p>')
                .appendTo($li)
                .find('span');
        }

        $percent.css('width',percentage * 100 + '%');
    });

    uploader.on('uploadError',function(file){
        var $li = $('#' + file.id),
            $error = $li.find('div.error');

        if (!$error.length){
            $error = $('<div class = "error"></div>').appendTo($li);
        }
        $error.text('上传失败');
    });

    uploader.on('uploadComplete',function(file){
        $('#' + file.id).find('.progress').remove();
    });
});






















