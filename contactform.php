<?php

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

    $mailTo = "Amititar27@icloud.com";
    $subject = "Contact Form Submission from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $txt = "You have received an email from $name:\n\n$message";


    if (mail($mailTo, $subject, $txt, $headers)) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    } else {
    echo 'Message has been sent!';
    }

    if (mail($mailTo, $subject, $txt, $headers)) {
    header("location: index.html?mailsend=success");
} else {
    header("location: index.html?mailsend=error");
}
} else {
    // Redirect or handle non-submission as needed
    header("location: index.html");
}
?>