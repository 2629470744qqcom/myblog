
//插入文本编辑器
layui.use(['form', 'layedit'], function() {
    var form = layui.form()
        ,layer = layui.layer
        ,layedit = layui.layedit
    var editIndex=layedit.build('editor', {
        tool: [
            'strong', //加粗
            'italic', //斜体
            'underline', //下划线
            'del', //删除线
            '|', //分割线
            'left', //左对齐
            'center', //居中对齐
            'right', //右对齐
            'link', //超链接
            'unlink', //清除链接
            'face', //表情
            'image', //插入图片
        ]
    });
    //自定义验证规则
    form.verify({
        title: function(value){
            if(value.length < 5){
                return '标题至少得5个字符哦';
            }
        }
        ,required:function(value){
            if(value ==0){
                return '该项为必填项哦';
            }
        }
        //,pass: [/(.+){6,12}$/, '密码必须6到12位']
        ,content: function(value){
            layedit.sync(editIndex);
        }
    });

});


//上传图片
layui.use('upload', function(){
    layui.upload({
        url: "http://localhost/Admin/Article/addtext", //上传接口
        before: function(input){
        //返回的参数item，即为当前的input DOM对象
        console.log('文件上传中');
    },
        success: function(res,input){ //上传成功后的回调
            console.log(res);
        }
    });
});



