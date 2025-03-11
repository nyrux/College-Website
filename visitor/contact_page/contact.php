<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
require_once('../../php/config.php');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phnum = $_POST['phnum'];
    $query = $_POST['query'];
    
    $mail = new PHPMailer(true);
    $htmlContent = "<h3>New Query Received</h3>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phnum</p>
    <p><strong>Query:</strong> $query</p>
";
    
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nirambrt3@gmail.com';
        $mail->Password   = 'mtkbsdprrymworjc';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom($email, $name);
        $emailArray = ['pergap3@gmail.com'];
        foreach ($emailArray as $email) {
            $mail->addAddress($email);
        }

        $mail->isHTML(true);
        $mail->Subject = "Visitors Query";
        $mail->Body    = $htmlContent;
        $mail->AltBody = 'Visitors Query';

        $mail->send();
        echo "<script>alert('Email has been sent successfully!');
        location.href = 'contact.html'; 
        </script>";
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
