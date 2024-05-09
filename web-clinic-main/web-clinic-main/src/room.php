<?php
session_start();
if (!isset($_SESSION['token'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: ../index.php');
} else {
  $token = $_SESSION['token'];
  $hotelName = $_SESSION['hotelName'];
  $openState = $_SESSION['openState'];
  $headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token,

);
$url = 'https://backend-application.pcnone.com/hotel/get-by-token';

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url);
curl_setopt($ch1, CURLOPT_HTTPGET, 1);
curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

$response1 = curl_exec($ch1);
curl_close($ch1);
$data1  = json_decode($response1, true);
$hotelId = $data1['id'];


$apiUrl = 'https://backend-application.pcnone.com/room/list-all-room';

$datahotel = array(
    'hotelId' => $hotelId,
);

// Initialize cURL session
$ch = curl_init($apiUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datahotel));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
));

// Execute cURL session and get the response
$response = curl_exec($ch);
// Close cURL session
curl_close($ch);

// Decode and display the response
$data  = json_decode($response, true);

}
  ?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lovely Pet</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/backgroud.css">
  <link rel="stylesheet" href="./css/images.css">
  <link rel="stylesheet" href="./css/spec.css">
  <link rel="stylesheet" href="./css/font.css">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="t1">
  <header>
  <?php include('./plugin/navbarroom.php');?>
  </header>

  <main>
    <section class="container">
    <?php include('./plugin/room.php');?>
    </section>
  </main>

</body>

</html>