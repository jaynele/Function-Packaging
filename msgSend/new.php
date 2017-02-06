<?php 
	function msg($mobile){
		include './TopSdk.php';
		$c = new \TopClient;
		$appkey = '23386140';
		$secret = '9feb6e4588c4f41f566b464363c22c8b';
		$c->appkey = $appkey;
		$c->secretKey = $secret;
		$rand = mt_rand(100000,999999);
		$_SESSION['rand'] = $rand;
		// $request->session()->put('smscode',$rand);
		$req = new \AlibabaAliqinFcSmsNumSendRequest;
		$req->setExtend("123456");
		$req->setSmsType("normal");
		$req->setSmsFreeSignName("注册验证");
		$req->setRecNum($mobile);
		$req->setSmsParam("{\"code\":\"{$rand}\",\"product\":\"短信测试\"}");
		$req->setSmsTemplateCode("SMS_8270413");
       // print_r($req);
		// $resp = $c->execute($req);
		// return $resp;
	}
	// msg();
	var_dump(msg($_POST['mobile']));
	echo '<br />';
	var_dump($_SESSION['rand']);
 ?>