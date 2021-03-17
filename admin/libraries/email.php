<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader // link require
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function send_mail($sent_to_email,$sent_to_fullname,$subject,$content,$option=array()) {
    global $config;
    $config_email=$config['email'];
// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = 0;  // hiển thị lỗi =0                    // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = $config_email['smtp_host'];                    // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = $config_email['smtp_user'];                     // SMTP username
        $mail->Password = $config_email['smtp_pass'];                               // SMTP password
        $mail->SMTPSecure = $config_email['smtp_secure'];         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = $config_email['smtp_port'];                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->CharSet = 'UTF-8'; // font chữ 
       
        //Recipients
        $mail->setFrom($config_email['smtp_user'], $config_email['smtp_fullname']); // mail gửi từ 
        $mail->addAddress($sent_to_email, $sent_to_fullname);  // mail người nhận
//    $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($config_email['smtp_user'], $config_email['smtp_fullname']); // mail nhận phản hồi 
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');
        // Attachments  // link đính kèm 
//        $mail->addAttachment('sp-1.jpg');         // Add attachments
//        $mail->addAttachment('sp-1.jpg', 'túi xách');    // Optional name
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject; // tiêu dề mail 
        $mail->Body = $content; // nội dung mail 
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "email k gửi dc . chi tiết lỗi. {$mail->ErrorInfo}";
    }
}
