<?php 
//view include:  layer.layui.com
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('resources/views/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('resources/views/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>
<body style="background:#F3F3F4;">
@yield('content')
</body>
</html>

//view : use it like this...
<script>

    function delArt(art_id){
        layer.confirm('您确定要删除这个文章吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post('{{url('admin/artical/')}}/'+art_id,{'_method':'delete','_token':'{{csrf_token()}}','art_id':art_id},function(data){
                if(data.status == 1){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 5});
                }
            });
//                layer.msg('的确很重要', {icon: 1});
        }, function(){
//                layer.msg('也可以这样', {
//                    time: 20000, //20s后自动关闭
//                    btn: ['明白了', '知道了']
//                });
        });
    }
</script>
