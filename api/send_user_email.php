<?php

// Enable error reporting for troubleshooting
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require '../vendor/autoload.php'; // If you used Composer
// OR
// require 'phpmailer/src/PHPMailer.php'; 
// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/SMTP.php'; 

function sendPurchaseConfirmation($userEmail, $userName, $orderID) {
    $mail = new PHPMailer(true); // Enable exceptions

    try {
        // Server settings
        $mail->isSMTP();                      
        $mail->Host       = 'http://mail.epigensol.co.uk:2079'; // Use your email provider's SMTP server
        $mail->SMTPAuth   = true;             
        $mail->Username   = 'info@epigensol.co.uk';  
        $mail->Password   = '@Epigen21!';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 2079; 

        // Recipients
        $mail->setFrom('info@epigensol.co.uk', 'Your Store');
        $mail->addAddress($userEmail, $userName); // User's email

        // Content
        $mail->isHTML(true); 
        $mail->Subject = "Test: Your Purchase Confirmation - Order #$orderID";
        $mail->Body    = "
            <h1>Thank you for your purchase, $userName!</h1>
            <p>Your order with ID <strong>$orderID</strong> has been confirmed.</p>
            <p>We appreciate your business!</p>
        ";

        $mail->send();
        echo 'Email has been sent successfully.';
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Usage
sendPurchaseConfirmation("chrismadufor@gmail.com", "Chris", 12345);
?>