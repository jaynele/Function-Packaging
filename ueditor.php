<?php 
//watch the index.html of the ueditor api,and we should require four script label ,also we need to instantiate it (实例化)
//view :
<td>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <script id="editor" type="text/plain" name="art_content" style="width:800px;height:200px;"></script>   //here we can change its style
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
    @if ($errors->has('art_content'))
        <p class="text-warning"> {{$errors->first('art_content')}}</p>
    @endif
</td>