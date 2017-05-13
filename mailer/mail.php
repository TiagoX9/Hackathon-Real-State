<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);

require 'class.phpmailer.php';
require 'class.smtp.php';
require 'mail-config.php';
//$config = array(
//    'server' => 'smtp.gmail.com',
//    'emailaddress' => '',//don't use primary email. create original one.
//    'password' => ''
//);

//validation//
sleep(3);

$firstname = trim($_POST['firstname']);
$surname = trim($_POST['surname']);
$phoneNumber = trim($_POST['phone-number']);
$email = trim($_POST['email']);
$yourMessage = trim($_POST['your-message']);
$honeypot = $_POST['honeypot'];
$humancheck = $_POST['humancheck'];

if(empty($_POST)){
    echo 'not a POST';
    exit();
}

if($honeypot == 'http://' && empty($humancheck)){
    $errors = array();

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "<p>Invalid email format.</p>";
    }

    if(empty($firstname)){
        $errors[] = "<p>Please provide your first name.</p>";
    }

    if(empty($surname)){
        $errors[] = "<p>Please provide your surname.</p>";
    }

    if(empty($yourMessage)){
        $errors[] = "<p>Message is required.</p>";
    }

    if(!empty($errors)){

        $return['error'] = true;
        $return['msg'] = "<h4>The request was successful but your is not filled out correctly.</h4>" . $errors;
        echo json_encode($return);
    }else{
        $return['error'] = false;
        $return['msg'] = "<h4>Thank you for contacting us!</h4>";
        echo json_encode($return);
    }
} else{
    $return['error'] = true;
    $return['msg'] = "<h4>There was a problem with submission. Please try again.</h4>";
    echo json_encode($return);
}

function send_email($to_address, $template, $subject)
{
    global $config;

    $mail = new PHPMailer();

    $mail->isSMTP();
//    $mail->SMTPDebug =2; //check bug
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
    $mail->addEmbeddedImage('../img/logo-brown.png', 'logo-brown');

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

send_email($_POST['email'], 'customer-email.php' ,'[Rezidence Želanského] Thank you for contacting us!'); //send to user
send_email('tomomi.suda03@gmail.com', 'admin-email.php', '[Rezidence Želanského] Contact from a customer');// send to admin


//header('Location: ../index.html');