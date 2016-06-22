<?php

//here we use uploadify,download it on http://www.uploadify.com/
//view :  require index.php of uploadify package
//use it like this ...
<td>
    <input type="text" size="50" name="art_thumb">
    <input id="file_upload" name="file_upload" type="file" multiple="true">
    <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
    <script type="text/javascript">
        <?php $timestamp = time();?>
        $(function() {
            $('#file_upload').uploadify({
                'formData'     : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    '_token'     : "{{csrf_token()}}"
                },
                'buttonText' : 'BROWSE...',
                'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
                'uploader' : "{{url('admin/upload')}}",    //here we need to get uploader a route
                'onUploadSuccess' : function(file, data, response) {
                    $('input[name=art_thumb]').val(data);
                    $('#art_thumb_img').attr('src','/'+data);
                }
            });
        });
    </script>
    @if ($errors->has('art_thumb'))
        <p class="text-warning"> {{$errors->first('art_thumb')}}</p>
    @endif
</td>

//get uploader a route  
 public function upload()
    {
        $file = Input::file('Filedata');
        if($file -> isValid()){
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $realPath = $file -> getRealPath();
            $newName = md5(date('YmdHis').mt_rand(1000,9999)).'.'.$entension;
            $path = $file -> move(base_path().'/upload',$newName);
            $filepath = 'upload/'.$newName;
            return  $filepath;
        }
    }

?>
