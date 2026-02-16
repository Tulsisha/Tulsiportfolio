<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city   = $_POST['city'];
    $purpose= $_POST['purpose'];

    $mail = new PHPMailer(true);

    try {

        // Server Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tulsishah668@gmail.com'; // Tumhara Gmail
        $mail->Password   = 'uqxg agpg wldx pqwr';     // App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender & Receiver
        $mail->setFrom($email, $name);
        $mail->addAddress('tulsishah668@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Website Enquiry';

        $mail->Body = "
        <h3>New Enquiry</h3>
        <p><b>Name:</b> $name</p>
        <p><b>Email:</b> $email</p>
        <p><b>Mobile:</b> $mobile</p>
        <p><b>City:</b> $city</p>
        <p><b>Purpose:</b> $purpose</p>
        ";

        $mail->send();

        echo "<h2>Message Sent Successfully ✅</h2>";

    } catch (Exception $e) {
        echo "Mail Error: {$mail->ErrorInfo}";
    }
}
?>
