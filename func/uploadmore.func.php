













//多文件函数的调用
<?php
  header('Content-type:text/html;charset=utf-8');
  include_once('upload.func.php');
  foreach($_FILES as $fileinfo){
    $files[]=uploadFile($fileinfo);
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        请选择要上传的文件 <input type="file" name="myFile1">
        请选择要上传的文件 <input type="file" name="myFile2">
        请选择要上传的文件 <input type="file" name="myFile3">
        请选择要上传的文件 <input type="file" name="myFile4">
        提交:<input type="submit" name="" value="上传文件">
    </form>
</body>
</html>
