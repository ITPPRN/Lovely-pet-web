<?php
session_start();
if (!isset($_SESSION['token'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: ../index.php');
} else {
    $token = $_SESSION['token'];
    $hotelName = $_SESSION['hotelName'];


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend-application.pcnone.com/booking/list-booking-by-clinic?request=approve',
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

    $order_all = curl_exec($curl);

    curl_close($curl);
    //echo $response;


    // print_r($order_all);
    // echo $token;
}
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        a {
            text-decoration: none;
            /* เอาเส้นใต้ข้อความออก */
            color: inherit;
            /* ให้ลิงก์เป็นสีเดียวกับข้อความ */
        }
    </style>

</head>

<body class="t1">
    <header>
        <?php include('./plugin/navbarorderbycilnic.php'); ?>
    </header>

    <main>
        <section class="container">
            <?php include('./plugin/orderbyclinic.php'); ?>
        </section>
    </main>

</body>

</html>