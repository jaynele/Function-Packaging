<?php
/**
 * Created by PhpStorm.
 * User: y
 * Date: 2016/7/12
 * Time: 11:52
 */
require_once('func.php');
require_once('Connect2.1/qqConnectAPI.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php if(!isset($_COOKIE['qq_accesstoken']) || !isset($_COOKIE['qq_openid'])){?>
<a href="qq.login.php">qq登录</a>
<?php }else { ?>
	<a href="qq.logout.php">qq退出登录</a>
	<?php
	$qc = new QC($_COOKIE['qq_accesstoken'], $_COOKIE['qq_openid']);
	$userinfo = $qc->get_user_info();
	debug($userinfo);

}?>
</body>
</html>