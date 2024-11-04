<?php
// Enable error reporting for troubleshooting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('config.php');
// include('send_user_mail.php');

// Retrieve user inputs from a form or any other method
$email = $_POST['email'];

// SQL to fetch user's hashed password based on email
$sql = "SELECT * FROM userList WHERE `email`='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found
    $row = $result->fetch_assoc();

    // Generate a unique token for password reset
    $token = bin2hex(random_bytes(32));
    print_r($token);

    $insert = mysqli_query(
        $conn,
        "INSERT INTO `password_resets`(
     email,
     token
      )
      VALUES(
     '$email',
     '$token'
      )"
    );


    if ($insert) {
        // Construct the reset password link
        $resetLink = "http://localhost:5173/reset_password?token=$token";

        // Send the reset link to the user's email
        // sendResetPasswordToken($email, $resetLink);

        $response = [
            "response" => 200,
            'status' => true,
            'message' => "Password reset link has been sent to your email"
        ];
        echo json_encode($response);
    }
} else {
    // User not found
    $response = [
        "response" => 400,
        'status' => false,
        'message' => "Email not found"
    ];
    echo json_encode($response);
}


$conn->close();
return;
?>