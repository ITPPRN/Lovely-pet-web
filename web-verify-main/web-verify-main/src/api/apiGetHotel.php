<?php


$token = $_SESSION['token'];

// URL ของ API
$api_url = "https://backend-application.pcnone.com/hotel/get-hotel-to-verify";

$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
);

// Initialize cURL session
$ch = curl_init($api_url);

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute cURL session and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Output the API response
//echo $response;

$hotelData = json_decode($response, true);

$_SESSION['hotelData'] = $hotelData;


?>