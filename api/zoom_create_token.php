<?php

// Allow access from all origins
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

// Define headers
$headers = array(
    "Authorization: Basic RlJfMk43TDBRQkdPRW1mTTNvYUVWQTp5U0hXUTI2N0x5ZlFaSmhkWGNkdGFJWjYySWkyUWVHTw==",
    "Cookie: __cf_bm=3YBvmnJ0CBIAfd6aIs2oIgDazBLXZXEDvHhy7aTb0ac-1711560916-1.0.1.1-LP5e.Axos3qYrjdr6JvrKm9LUVwanEQ43RJSFZ4R3j3pA1iyrBrTzkV0rk6jGTz1XsQkKekoMRgHgL7iaHY0Ww; _zm_chtaid=48; _zm_ctaid=JRoctKY-RMS-pZpvgH2C5w.1711561460455.05be5d9ebcb63cd86439fa5f361fe8b5; _zm_mtk_guid=78500823d6a04030805dce1895683189; _zm_page_auth=us05_c_6_-_-3oMTfKiR7VhcTkJ4g; _zm_ssid=us05_c_cVw9-37JSnqouFgL_vO30g; cred=55E2AB058D82AD5EA4E2B3DFFB59102F"
);

// Define form data
$formData = array(
    "grant_type" => "account_credentials",
    "account_id" => "FLVvm4xhTfyU7LGx7nfk_w"
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, "https://zoom.us/oauth/token");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formData));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);

// Check for errors
if($response === false) {
    $error = curl_error($ch);
    echo "Error: " . $error;
} else {
    // Output response
    echo $response;
}

// Close cURL session
curl_close($ch);

?>
