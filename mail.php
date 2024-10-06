<?php

$to = "lalitkp0101@gmail.com";
$subject = "Hello Mail";
$message = "Hello, this is a test email sent by PHP";
$headers = "From: sitabenprajapati1980@gmail.com";

mail($to,  $subject, $message, $headers);
echo "Email  sent successfully";

