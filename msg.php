<?php 
//views :use ajax send the mobile number
<button onclick="sms(this);" class="btn">点击获取短信验证码 </button>
function sms(obj){
    var mobile = $('#mobile').val();
    if(!/^1[3578]\d{9}$/.test(mobile)){
        alert('手机号不正确');
        return false;
    }
    var btn = obj;
    btn.disabled = true;
    var timer = 60;
    var clock = null;
    clock = setInterval(function(){
        --timer;
        if(timer > 0){
            btn.innerHTML = timer + '秒后可重新获取短信验证码';
        }else{
            btn.disable = false;
            btn.innerHTML =  '点击重新获取短信验证码';
        }
    },1000);
    $.get('/admin/sms/'+mobile,function(data){
        console.log(data);
    });
    return false;
}

//controller :get the mobile number ,then send msg 
//here i use the msg api of alidayu ,we must get the appkey and secret
//sending like this...
public function sms(Request $request ,$mobile){
		include(base_path().'/resources/org/alidayu/TopSdk.php');
		$c = new \TopClient;
		$appkey = '*****';
		$secret = '*************';
		$c->appkey = $appkey;
		$c->secretKey = $secret;
		$rand = mt_rand(100000,999999);
		$request->session()->put('smscode',$rand);    //here we store the msg in session
		$req = new \AlibabaAliqinFcSmsNumSendRequest;
		$req->setExtend("123456");
		$req->setSmsType("normal");
		$req->setSmsFreeSignName("注册验证");
		$req->setRecNum($mobile);
		$req->setSmsParam("{\"code\":\"{$rand}\",\"product\":\"短信测试\"}");
		$req->setSmsTemplateCode("SMS_******");
//        print_r($req);       //open this we cannot consume          
		$resp = $c->execute($req);
//        var_dump($resp);
	}


// here we get msg from session and give this function a route to test it
	public function checksms(){
		return session('smscode');
	}

//test it
    $smscode = $this->checksms();
	if($smscode != $input['user_code']){
		return back()->with('msg','短信验证码不正确!');
	}