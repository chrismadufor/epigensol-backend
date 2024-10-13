<?php
// Set your Stripe secret key here

$amount = $_POST['amount'];
$data = $_POST['data'];

// Set your desired amount and currency
$currency = 'gbp';

// Set up your request to Stripe
$request = array(
    'amount' => $amount,
    'currency' => $currency,
    "description"=> $data["notes"],
    "shipping[address][line1]" =>  $data["shipping_address"],
    "shipping[name]"=> $data["first_name"] . " " . $data["last_name"],
    "shipping[address][postal_code]"=> $data["zip"] ,
    "shipping[address][city]"=> $data["city"] ,
    "shipping[address][state]"=> $data["state"],
    "shipping[address][country]"=> $data["country"] 
);

// Send the request to create a PaymentIntent to Stripe
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $stripeSecretKey,
));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Get the response from Stripe
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    echo $response; // This will still echo the response if cURL is successful
}
curl_close($ch);

// Set CORS headers to allow requests from your frontend domain
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Return the PaymentIntent client secret to the client
// echo $response;

?>
