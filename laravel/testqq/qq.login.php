<?php
/**
 * Created by PhpStorm.
 * User: y
 * Date: 2016/7/12
 * Time: 9:59
 */
require_once('func.php');
require_once('Connect2.1/qqConnectAPI.php');

//访问qq登录页面
$oauth = new Oauth();
$oauth->qq_login();

