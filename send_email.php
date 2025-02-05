<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If using Composer

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Gmail SMTP Server
    $mail->SMTPAuth = true;
    $mail->Username = 'explorerclepsydra@gmail.com'; // Your Gmail
    $mail->Password = 'wuus eufq cuhj hniq'; // Gmail App Password (not your Gmail password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Email settings
    $mail->setFrom($email, $name);
    $mail->addAddress("javednayeemavi@gmail.com");
    $mail->Subject = "New Contact Form Submission";
    $mail->Body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";

    // Send email
    $mail->send();
    echo "success";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
