<?php

require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

// Create PHPMailer object
$mail = new PHPMailer(true);

// Set as SMTP
$mail->isSMTP();

// Add SMTP server details - Copy over user details from SMTP service (MailSend)
$mail->SMTPAuth   = true;
$mail->Host       = '[ENTER SMTP SERVICE HOST]';
$mail->Username   = '[ENTER SMTP SERVICE USERNAME]';
$mail->Password   = '[ENTER SMTP SERVICE PASSWORD]';
$mail->Port       = 587;

// Set E-mail content
$mail->setFrom('[ENTER SMTP SERVICE E-MAIL]', 'MailSend');
$mail->addAddress('[ENTER YOUR E-MAIL]', 'Your Name');
$mail->isHTML(true);
$mail->Subject = 'PHPMailer Test Email';
$mail->Body    = 'This is a test <b>E-mail!</b>';
$mail->addAttachment('[ADD PATH TO PROJECT]/assets/phpmailer-image.png');

try {
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
