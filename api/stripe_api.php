<?php

// Set your Stripe secret key here
// $stripeSecretKey = '';
$amount = $_POST['amount'];

// Set your desired amount and currency
$currency = 'eur';

// Set up your request to Stripe
$request = array(
    'amount' => $amount,
    'currency' => $currency,
     "description"=> "Appointment Service",
        "shipping[address][line1]" => "510 Townsend St",
        "shipping[name]"=> "Jenny Rosen",
         "shipping[address][postal_code]"=> "98140" ,
         "shipping[address][city]"=> "San Francisco" ,
         "shipping[address][state]"=> "CA" ,
         "shipping[address][country]"=> "US" 
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

// Get the response from Stripe
$response = curl_exec($ch);
curl_close($ch);

// Set CORS headers to allow requests from your frontend domain
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Return the PaymentIntent client secret to the client
echo $response;

?>
