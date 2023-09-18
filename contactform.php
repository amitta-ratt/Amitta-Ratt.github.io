<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mailTo = "Amitta.Ratt@outlook.co.th";
    $headers = "From: ".$email;
    $txt = "You have received an email from ".$name.".\n\n".$message;

 mail($mailTo, $txt, $headers);
 header("location: index.html?mailsend");  
    }

 
    
