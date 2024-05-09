<?php
session_start();
if (!isset($_SESSION['token'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: ../index.php');
} else {
  $token = $_SESSION['token'];
  $token = $_SESSION['token'];
  $hotelName = $_SESSION['hotelName'];
  $openState = $_SESSION['openState'];

}

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // เช็คว่ามีการส่งข้อมูลแบบ POST มาหรือไม่

  // เก็บค่าที่ผู้ใช้ป้อนเข้ามา
  $details = $_POST['Details'];
  $price = $_POST['price'];
  $type = $_POST['type'];
  $total = $_POST['total'];

  // ข้อมูลที่ต้องการส่ง
  $data = array(
    "total" => $total,
    "hotelId" => $hotelId,
    "price" => $price,
    "details" => $details,
    "type" => $type
  );

  // แปลงข้อมูลเป็นรูปแบบ JSON
  $data_json = json_encode($data);

  // URL ของ API
  $url = 'https://backend-application.pcnone.com/room/add-room';

  // กำหนด header สำหรับคำขอ
  $headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token,
    'Content-Length: ' . strlen($data_json)
  );

  // สร้าง cURL handle
  $ch = curl_init();

  // กำหนดตัวเลือก cURL
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


  // ส่งคำขอ API
  $response = curl_exec($ch);
  curl_close($ch);
  // ตรวจสอบการตอบกลับ
  if ($response === FALSE) {
    // หากมีข้อผิดพลาดในการส่งคำขอ
    echo "เกิดข้อผิดพลาดในการส่งคำขอ API: " . curl_error($ch);
  } 
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <div>
  <script>
    swal({
      title: " เพิ่มห้องสำเร็จ!",
      icon: "success"
    }).then((value) => {
      // ไปยังหน้า index.php
      window.location.href = "room.php";
    });
  </script></div>
<?php
  
}
// ปิด cURL handle


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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="t1">
  <header>
    <?php include('./plugin/navbarroom.php'); ?>
  </header>

  <main>
    <section class="container">
      <?php include('./plugin/addroom.php'); ?>
    </section>
  </main>

</body>

</html>