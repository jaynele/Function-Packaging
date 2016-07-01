<?php
$filename = $_GET['filename'];
header('content-disposition:attachment;filename=king_'.basename($filename));
header('content-length:'.filesize($filename));
readfile($filename);


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href='1.rar'>下载1.rar</a>//浏览器如果不认识这个文件类型,则会下载
<a href='1.jpg'>下载1.jpg</a>//浏览器如果认识这个文件类型,则会直接打开,不会进入下载
<a href='download.php?filename=1.jpg'>通过程序下载1.JPG</a>
<form action="" method="post" enctype="multipart/form-data">
请选择要上传的文件 <input type="file" name="myFile1">
提交:<input type="submit" name="" value="上传文件">
</form>
</body>
</html>
