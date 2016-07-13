<?php
require_once('config.php');
require_once('libweibo-master/saetv2.ex.class.php');
$islogin = isset($_COOKIE['accesstoken']);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php if(!$islogin){?>
<a href="wblogin.php"><img src="libweibo-master/weibo_login.png" alt=""/></a>
<?php }else{?>
	你已经登录微博账号
	<a href="wblogout.php">退出微博</a>
	<hr />
<?php
	$o = new SaeTClientV2(WB_KEY,WB_SEC,$_COOKIE['accesstoken']);
	$o->update('来自火星发布的微博');
	//$o->upload();//发布上传带图片的微博
}?>
</body>
</html>
