<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Allow access from all origins
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

// Get the raw JSON data from the request body
$requestBody = file_get_contents('php://input');

// Decode the JSON data into a PHP associative array
$requestData = json_decode($requestBody, true);

// Extract the authorization token, start time, and topic from the request data
$token = $_POST['token'];
$startTime = $_POST['startTime'];
$topic = $_POST['topic'];

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.zoom.us/v2/users/me/meetings',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "topic": "' . $topic . '",
    "type": 2,
    "start_time": "' . $startTime . '",  
    "duration": 30,
    "password": 123456,  
    "timezone": "Asia/Kolkata",
    "agenda": "Interview Meeting",
    "settings": {
        "host_video": false,
        "participant_video": true,
        "cn_meeting": false,
        "in_meeting": false,
        "join_before_host": true,
        "mute_upon_entry": true,
        "watermark": false,
        "use_pmi": false,
        "approval_type": 1,
        "registration_type": 1,
        "audio": "voip",
        "auto_recording": "none",
        "waiting_room": false
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token,
    'Cookie: __cf_bm=3YBvmnJ0CBIAfd6aIs2oIgDazBLXZXEDvHhy7aTb0ac-1711560916-1.0.1.1-LP5e.Axos3qYrjdr6JvrKm9LUVwanEQ43RJSFZ4R3j3pA1iyrBrTzkV0rk6jGTz1XsQkKekoMRgHgL7iaHY0Ww; _zm_mtk_guid=78500823d6a04030805dce1895683189; _zm_page_auth=us05_c_6_-_-3oMTfKiR7VhcTkJ4g; _zm_ssid=us05_c_cVw9-37JSnqouFgL_vO30g; cred=FF64E211C521463AA39C2A354591A1C4'
  ),
));

// Execute cURL request
$response = curl_exec($curl);

// Check for cURL errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    // Output response
    echo $response;
}

// Close cURL session
curl_close($curl);

?>
