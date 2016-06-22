<?php 
//general we use it with middleware
//composer  cd ..out project
//packagist.org  we search the mail
//composer require nette/mail
//then we use it like this ...
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;

$mail = new Message;
$mail->setFrom('John <john@example.com>')   //the same to username
    ->addTo('peter@example.com')
    ->addTo('jack@example.com')
    ->setSubject('Order Confirmation')
    ->setBody("Hello, Your order has been accepted.");

    $mailer = new SmtpMailer([
        'host' => 'smtp.gmail.com',
        'username' => 'john@gmail.com',   //the same to setFrom
        'password' => '*****',
        'secure' => 'ssl',      //we can drop it and the below
        'context' =>  [
            'ssl' => [
                'capath' => '/path/to/my/trusted/ca/folder',
             ],
        ],
	]);
$mailer->send($mail);