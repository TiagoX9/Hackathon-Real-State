<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);

require 'class.phpmailer.php';
require 'class.smtp.php';
require 'mail-config.php';

function send_email($to_address, $template, $subject)
{
    global $config;

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPDebug =2;
    $mail->Host = $config['server'];
    $mail->SMTPAuth = true;
    $mail->Username = $config['emailaddress'];
    $mail->Password = $config['password'];
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('tomomi.suda03@gmail.com', 'tomomi');//should change to admin mail address for info
    $mail->addAddress($to_address);
    $mail->Subject = $subject;
    $mail->isHTML(true);

    ob_start();

    include $template;

    $html = ob_get_clean();

    $mail->Body = $html;

    if ($mail->send()) {
        echo 'sent';
    } else {
        echo 'not sent';
    }


}

send_email($_POST['email'], 'customer-email.php' ,'Thank you for contacting us!'); //send to user
send_email('tomomi.suda03@gmail.com', 'admin-email.php', 'Contact from a customer');// send to admin


header('Location: ../index.html');