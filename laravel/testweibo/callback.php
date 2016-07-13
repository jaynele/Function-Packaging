<?php
/**
 * Created by PhpStorm.
 * User: y
 * Date: 2016/7/12
 * Time: 23:33
 */
require_once('config.php');
require_once('libweibo-master/saetv2.ex.class.php');
$code = $_GET['code'];
$keys['code'] = $code;
$keys['redirect_uri'] = CALLBACK;
$to = new SaeTOAuthV2(WB_KEY,WB_SEC);
$auth = $to->getAccessToken($keys);
//debug($auth);
setcookie('accesstoken',$auth['access_token']);
header('Location:index.php');