<?php

//laravel  5.*  config/mail.php   配置

'host' => 'smtp.163.com',
'port' => 25,
'from' => array('address' => '***@163.com', 'name' => 'TestMail'),
'username' => '***@163.com', // 注意，这里必须和上一行配置里面的邮件地址一致
'password' => '****',



//发送  在控制器或者模型里，调用以下代码：
$data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code   ];
Mail::send('activemail', $data, function($message) use($data)
{
    $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
});



//邮件视图为 views/activemail.blade.php：
<!doctype html>
<html lang="zh-CN">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  </head>
<body>
  <a href="{{ URL('active?uid='.$uid.'&activationcode='.$activationcode) }}" target="_blank">点击激活你的账号</a>
</body>
</html>
