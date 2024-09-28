<?php

require('config.php');
// Function to verify password using bcrypt
function verifyPassword($password, $hashedPassword)
{
    return password_verify($password, $hashedPassword);
}

// Retrieve user inputs from a form or any other method
$email = $_POST['email'];
$password = $_POST['password'];

// SQL to fetch user's hashed password based on email
$sql = "SELECT password FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found
    $row = $result->fetch_assoc();
    $hashedPassword = $row["password"];

    // Verify password
    if (verifyPassword($password, $hashedPassword)) {
        // Password is correct
        $response = [
            "response" => 200,
            'status' => true,
            'message' => "Login successful"
        ];
        echo json_encode($response);
        // You can redirect the user to a dashboard or any other page here
    } else {
        // Password is incorrect
        $response = [
            "response" => 201,
            'status' => false,
            'message' => "Incorrect email or password"
        ];
        echo json_encode($response);
    }
} else {
    // User not found
    $response = [
        "response" => 201,
        'status' => false,
        'message' => "Incorrect email or password"
    ];
    echo json_encode($response);
}


$conn->close();
return;
?>