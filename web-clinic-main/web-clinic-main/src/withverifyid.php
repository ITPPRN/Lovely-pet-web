<?php
ob_start();
session_start();
if (!isset($_SESSION['token'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: ../index.php');
} else {
  $token = $_SESSION['token'];
  
  $token;
}


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/get-by-token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$responseData = json_decode($response, true);
$id = $responseData['id']

?>


<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lovely Pet</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./css/backgroud.css">
  <link rel="stylesheet" href="./css/images.css">
  <link rel="stylesheet" href="./css/spec.css">
  <link rel="stylesheet" href="./css/font.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="./image/logo.png" alt="Lovely Pet" style="width: 70px; height: auto;">
                <a class="navbar-brand" style="color: white; font-size: 24px;">LOVELY PET</a>
            </div>
            <div class="ml-auto">
                <!-- เพิ่มปุ่มออกจากระบบ -->
                <a href="../logout.php" class="btn btn-outline-light">ออกจากระบบ</a>

            </div>
        </div>
    </nav>
</header>

  <main>
    <section class="container">
      <?php


      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/get-hotel-by-id?id='.$id.'',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer ' . $token
        ),
      ));

      $response1 = curl_exec($curl);

      curl_close($curl);
      //echo $response;

      // ตรวจสอบว่ามีข้อผิดพลาดในการเชื่อมต่อหรือไม่
      if ($response === false) {
        echo 'เกิดข้อผิดพลาดในการเชื่อมต่อ: ' . curl_error($ch);
      } else {
        // แปลง response เป็น JSON
        $responseData = json_decode($response1, true);

        // ตรวจสอบสถานะ
        if (isset($responseData['verify']) && $responseData['verify'] === 'approve') {
          $_SESSION['hotelName'] = $responseData['hotelName'];
          $_SESSION['openState'] = $responseData['openState'];
          header('location: dashboard.php');
        } else {
          echo '<br><br><br><br><div class="row justify-content-center">
                    <div class="col">
                        <div class="center-card2">
                            <div class="card ">
                                <div class="card-body yellow-bg text-center">
                                <center>

                                    <label>โปรดรอการยืนยันบัญชี . . .
<br>
<img src="./image/mawnoon1.png" alt="verify_error" style="width: 150px; height: auto;">
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        }
      }

      ?>
    </section>
  </main>

</body>

</html>