<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mailTo = "https://mail.google.com/chat/u/0/#browse/chat/q=";
    $headers = "From: ".$email;
    $txt = "You have received an email from ".$name.".\n\n".$message;

 mail($mailTo, $txt, $headers);
 header("location: index.html?mailsend");  
    }
