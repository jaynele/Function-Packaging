<?php
/**
 * Created by PhpStorm.
 * User: y
 * Date: 2016/7/12
 * Time: 23:21
 */
require_once('config.php');
require_once('libweibo-master/saetv2.ex.class.php');

$to = new SaeTOAuthV2(WB_KEY,WB_SEC);
//$url = 'http://test.jiajiajiali.applinzi.com/callback.php';
$oauth = $to->getAuthorizeURL(CALLBACK);
header('Location:'.$oauth);
