<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name) || empty($email) || empty($message)) {
        header("location: index.html?error=emptyfields");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: index.html?error=invalidemail");
        exit();
    }

try {
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_Amitta.Ratt@outlook.com'; 
    $mail->Password = 'your_572gt_BlaG861_Ku'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 


    $mail->setFrom($email, $name);
    $mail->addAddress('Amitta.Ratt@outlook.com', 'Amitta Rattanawadee');

    $mail->isHTML(true);
    $mail->Subject = 'Contact Form Submission from ' . $name;
    $mail->Body = $message;

if (!$mail->send()) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} else {
    echo 'Message has been sent!';
}

    header("location: index.html?mailsend=success");
} catch (Exception $e) {
    header("location: index.html?mailsend=error");
}
} else {
// Redirect or handle non-submission as needed
header("location: index.html");
}
?>