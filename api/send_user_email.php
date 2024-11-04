<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function sendPurchaseConfirmation($userEmail, $userName, $orderID, $orderDate, $orderTotal)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'epigensol.co.uk';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'shop@epigensol.co.uk';                     //SMTP username
        $mail->Password = 'epigenShop@1';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('shop@epigensol.co.uk', 'Epigensol Store');
        $mail->addAddress($userEmail, $userName);     //Add a recipient             //Name is optional

        //Content
        $mail->addEmbeddedImage('../files/logo.png', 'company_logo');
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Your Purchase Confirmation - Order #{$orderID}";
        $mail->Body = "
    <div style='text-align: center;'>
            <img src='cid:company_logo' alt='Company Logo' width='150' />
        </div>
    <h2>Thank you for your purchase, {$userName}!</h2>
            <p>
                We’re excited to let you know that your order <strong>#{$orderID}</strong> 
                is being processed and will be delivered within 14 working days! 
            </p>
            <p>Here’s a quick summary of your purchase:</p>
            <ul>
                <li><strong>Order ID:</strong> {$orderID}</li><br>
                <li><strong>Date:</strong> {$orderDate}</li><br>
                <li><strong>Total:</strong> £{$orderTotal}</li><br>
            </ul>
            <p>If you have any questions or need assistance, feel free to <a href='mailto:info@epigensol.co.uk'>contact us</a>.</p>
            <p>Thank you for choosing Epigensol! We appreciate your patronage.</p>";
        $mail->AltBody = "Thank you for your purchase, {$userName}!. Your order with ID {$orderID} has been confirmed. We appreciate your patronage!";

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// sendPurchaseConfirmation("chrismadufor@gmail.com", "Chris", 12345, "14th October, 2024", "300.50");

function sendAdminNotification($userEmail, $customerFirst, $customerLast, $customerEmail, $customerPhone, $orderID, $orderDate, $address, $zip, $region, $orderTotal)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'epigensol.co.uk';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'shop@epigensol.co.uk';                     //SMTP username
        $mail->Password = 'epigenShop@1';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('shop@epigensol.co.uk', 'Epigensol Store');
        $mail->addAddress($userEmail, "Admin");     //Add a recipient             //Name is optional

        //Content
        $mail->addEmbeddedImage('../files/logo.png', 'company_logo');
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "New Completed Order - Order #{$orderID}";
        $mail->Body = "
    <div style='text-align: center;'>
            <img src='cid:company_logo' alt='Company Logo' width='150' />
        </div>
    <h2>Hi Epigensol Admin, we have a new order!</h2>
            <p>Here’s a quick summary of the purchase:</p>
            <ul>
                <li><strong>Customer Name:</strong> {$customerFirst} {$customerLast}</li><br>
                <li><strong>Customer Email:</strong> {$customerEmail}</li><br>
                <li><strong>Customer Phone:</strong> {$customerPhone}</li><br>
                <li><strong>Order ID:</strong> {$orderID}</li><br>
                <li><strong>Date:</strong> {$orderDate}</li><br>
                <li><strong>Shipping Address:</strong> {$address}</li><br>
                <li><strong>Zip code:</strong> {$zip}</li><br>
                <li><strong>Region:</strong> {$region}</li><br>
                <li><strong>Total:</strong> £{$orderTotal}</li><br>
            </ul><br>
            <p>Log in to the Epigensol admin portal to view details and process the order.</p>
            ";
        $mail->AltBody = "Hi Admin, we have a new order!. The order with ID {$orderID} has been confirmed. Login to your portal to view details!";

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// sendAdminNotification("chrismadufor@gmail.com", "Cynthia", "Egwuatu", "egwuatu69@gmail.com", "08099194275", 12345, date("jS F, Y"), "Covenant hostel", "100304", "Ibadan, NIgeria", "300.50");

function sendResetPasswordToken($userEmail, $link)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'epigensol.co.uk';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'info@epigensol.co.uk';                     //SMTP username
        $mail->Password = '@Epigen21!';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('info@epigensol.co.uk', 'Reset Password');
        $mail->addAddress($userEmail, "Epigensol user");     //Add a recipient             //Name is optional

        //Content
        $mail->addEmbeddedImage('../files/logo.png', 'company_logo');
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Reset Your Password";
        $mail->Body = "
        <div style='text-align: center;'>
                <img src='cid:company_logo' alt='Company Logo' width='150' />
            </div>
                <p>
                    You have received this email because you requested to reset the password for your Epigensol account. If this was not you, kindly ignore this email else, click the link below to proceed
                </p>
                <p>{$link}</p>
                <p>If you have any questions or need assistance, feel free to <a href='mailto:info@epigensol.co.uk'>contact us</a>.</p>
                <p>Thank you for choosing Epigensol!</p>";
        $mail->AltBody = "To reset your password, click the link: {$link}";

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}