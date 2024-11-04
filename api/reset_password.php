<?php
// Enable error reporting for troubleshooting
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require('config.php');

// Retrieve user inputs from a form or any other method
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$token = $_POST['token'];

// SQL to fetch token from password_resets table
$sql = "SELECT * FROM password_resets WHERE `token`='$token'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // token found
    // check expiry
    // get email from $row
    $row = $result->fetch_assoc();
    $email = $row["email"];

    // update password using email
    $sql = "UPDATE userList SET password='$password' WHERE `email`='$email'";
    $updateResult = $conn->query($sql);

    // Remove the token from password_resets table
    $tokenSql = "DELETE FROM password_resets WHERE `token`='$token'";
    $updateResult = $conn->query($tokenSql);

    if ($updateResult) {
        $response = [
            "response" => 200,
            'status' => true,
            'message' => "Password reset was successful"
        ];
        echo json_encode($response);
    }
} else {
    $response = [
        "response" => 400,
        'status' => false,
        'message' => "Token has expired. Try again"
    ];
    echo json_encode($response);
}


$conn->close();
return;
?>