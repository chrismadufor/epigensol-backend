<?php


require('config.php');
// Define FCM endpoint
$url = 'https://fcm.googleapis.com/fcm/send';

$body= $_POST['body'];
$title= $_POST['title'];
$token= $_POST['token'];
// Prepare data for the FCM message
$sendData = [
    "to" => $token,
    "notification" => [
        "sound" => "default",
        "body" => $body,
        "title" => $title,
        "content_available" => true,
        "priority" => "high",
    ],
    "data" => [
        "sound" => "default",
        "body" => $body,
        "title" => $title,
        "content_available" => true,
        "priority" => "high"
    ]
];

// Convert data to JSON format
$postData = json_encode($sendData);

// Set up cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: key=AAAAsCBguao:APA91bGR6UnCuSzKR_ane7_W3lOtCL_Oke8LZIWKluPuZs4dZjHzCFXR1-EU48Uw_AYLAXhyMxEHEETWCvtWNW-mu2rJiIEjj6xOof-pAQkSzf64dBBpPnmAGFJqqHzm_eKawxh-FRuC',
    'Content-Type: application/json',
]);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Handle response
echo $response;
?>
