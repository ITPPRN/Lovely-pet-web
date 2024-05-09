<?php
session_start();
if (!isset($_SESSION['token'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: ../index.php');
} else {
  $token = $_SESSION['token'];
  //echo $token;
  $details = $_GET["roomDetails"];
  $price = $_GET["roomPrice"];
  $type = $_GET["type"];
  $id = $_GET["id"];
}

//เอาชื่อภาพ
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://backend-application.pcnone.com/room/get-images-url',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{
  "id":' . $id . '
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
  ),
));
$response1 = curl_exec($curl);
curl_close($curl);
$response_array1 = json_decode($response1, true);





if (isset($response_array1[0]) && !is_null($response_array1[0])) {
  // $response_array1[0] เป็น null
  //echo $img1 = $response_array1[0];
  $img1 = $response_array1[0];
  //เอาภาพมาแสดงถอดรหัส ภาพ1
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://backend-application.pcnone.com/room/get-images',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{"namePhoto":"' . $img1 . '"}',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $token
    ),
  ));
  $img_slp1 = curl_exec($curl);
  // แปลงข้อมูลไบนารีเป็น base64
  $base64_image1 = base64_encode($img_slp1);
  // สร้าง URL ของรูปภาพ
  $image_slp_src1 = 'data:image/jpeg;base64,' . $base64_image1;
}

if (isset($response_array1[1]) && !is_null($response_array1[1])) {
  // $response_array1[1] เป็น null
  $img2 = $response_array1[1];
  //เอาภาพมาแสดงถอดรหัส ภาพ2
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://backend-application.pcnone.com/room/get-images',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{"namePhoto":"' . $img2 . '"}',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $token
    ),
  ));

  $img_slp2 = curl_exec($curl);
  // แปลงข้อมูลไบนารีเป็น base64
  $base64_image2 = base64_encode($img_slp2);
  // สร้าง URL ของรูปภาพ
  $image_slp_src2 = 'data:image/jpeg;base64,' . $base64_image2;
}

if (isset($response_array1[2]) && !is_null($response_array1[2])) {
  // $response_array1[2] เป็น null
  $img3 = $response_array1[2];
  //เอาภาพมาแสดงถอดรหัส ภาพ3
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://backend-application.pcnone.com/room/get-images',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{"namePhoto":"' . $img3 . '"}',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $token
    ),
  ));
  $img_slp3 = curl_exec($curl);
  // แปลงข้อมูลไบนารีเป็น base64
  $base64_image3 = base64_encode($img_slp3);
  // สร้าง URL ของรูปภาพ
  $image_slp_src3 = 'data:image/jpeg;base64,' . $base64_image3;
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

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <header>
    <?php //include('./plugin/navbarroom.php'); 
    ?>
  </header>

  <main>
    <section class="container">
      <?php include('./plugin/updateroom.php'); ?>
    </section>
  </main>

</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // เช็คว่ามีการส่งข้อมูลแบบ POST มาหรือไม่

  // เก็บค่าที่ผู้ใช้ป้อนเข้ามา
  $details = $_POST['Details'];
  $price = $_POST['price'];
  $type = $_POST['type'];

  // ข้อมูลที่จะส่งไปยัง API
  $data = array(
    "type" => $type,
    "price" => $price,
    "details" => $details,
    "id" => $id,

  );

  // URL ของ API
  $url = "https://backend-application.pcnone.com/room/update-room";


  // แปลงข้อมูลเป็น JSON format
  $postData = json_encode($data);

  // กำหนด header สำหรับ request
  $headers = array(
    "Content-Type: application/json",
    'Authorization: Bearer ' . $token,
    "Content-Length: " . strlen($postData)
  );

  // สร้าง HTTP request
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  // ทำการ execute request และรับ response
  $response = curl_exec($ch);

  // ปิดการใช้งาน curl
  curl_close($ch);

  // แสดงผล response
  //echo $response;


  $apiEndpoint = 'https://backend-application.pcnone.com/room/upload-image';

  // ตรวจสอบว่ามีการส่งไฟล์รูปภาพหรือไม่
  if (isset($_FILES['image1']) && !empty($_FILES['image1']['name'])) {
    $file_name = $_FILES['image1']['name']; // ชื่อไฟล์
    $file_tmp = $_FILES['image1']['tmp_name']; // ชื่อชั่วคราวของไฟล์ที่อัปโหลด

    // กำหนดค่า POST data
    $post_data = array(
      'file' => new CURLFile($file_tmp, $_FILES['image1']['type'], $file_name),
      'id' => $id, // ค่า ID ที่ต้องการส่งไปยัง API
    );

    // สร้าง cURL session
    $curl = curl_init();

    // กำหนดตัวเลือกสำหรับ cURL session
    curl_setopt_array($curl, array(
      CURLOPT_URL => $apiEndpoint,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $post_data,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token
      ),
    ));

    // ดำเนินการ cURL session และเก็บผลลัพธ์
    $response = curl_exec($curl);

    // ตรวจสอบข้อผิดพลาด
    if (curl_errno($curl)) {
      echo 'Curl error: ' . curl_error($curl);
    }

    // แสดงผลลัพธ์
    //echo $response;

    // ปิด cURL session
    curl_close($curl);
  }



  if (isset($_FILES['image2']) && !empty($_FILES['image2']['name'])) {
    $file_name = $_FILES['image2']['name']; // ชื่อไฟล์
    $file_tmp = $_FILES['image2']['tmp_name']; // ชื่อชั่วคราวของไฟล์ที่อัปโหลด

    // กำหนดค่า POST data
    $post_data = array(
      'file' => new CURLFile($file_tmp, $_FILES['image2']['type'], $file_name),
      'id' => $id, // ค่า ID ที่ต้องการส่งไปยัง API
    );

    // สร้าง cURL session
    $curl = curl_init();

    // กำหนดตัวเลือกสำหรับ cURL session
    curl_setopt_array($curl, array(
      CURLOPT_URL => $apiEndpoint,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $post_data,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token
      ),
    ));

    // ดำเนินการ cURL session และเก็บผลลัพธ์
    $response = curl_exec($curl);

    // ตรวจสอบข้อผิดพลาด
    if (curl_errno($curl)) {
      echo 'Curl error: ' . curl_error($curl);
    }

    // แสดงผลลัพธ์
    //echo $response;

    // ปิด cURL session
    curl_close($curl);
  }

  if (isset($_FILES['image3']) && !empty($_FILES['image3']['name'])) {
    $file_name = $_FILES['image3']['name']; // ชื่อไฟล์
    $file_tmp = $_FILES['image3']['tmp_name']; // ชื่อชั่วคราวของไฟล์ที่อัปโหลด

    // กำหนดค่า POST data
    $post_data = array(
      'file' => new CURLFile($file_tmp, $_FILES['image3']['type'], $file_name),
      'id' => $id, // ค่า ID ที่ต้องการส่งไปยัง API
    );

    // สร้าง cURL session
    $curl = curl_init();

    // กำหนดตัวเลือกสำหรับ cURL session
    curl_setopt_array($curl, array(
      CURLOPT_URL => $apiEndpoint,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $post_data,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token
      ),
    ));

    // ดำเนินการ cURL session และเก็บผลลัพธ์
    $response = curl_exec($curl);

    // ตรวจสอบข้อผิดพลาด
    if (curl_errno($curl)) {
      echo 'Curl error: ' . curl_error($curl);
    }

    // แสดงผลลัพธ์
    //echo $response;

    // ปิด cURL session
    curl_close($curl);
  }

?>
  <script>
    swal({
      title: "อัพเดทข้อมูลห้องสำเร็จ!",
      icon: "success"
    }).then((value) => {
      // ไปยังหน้า index.php
      window.location.href = "./room.php";
    });
  </script>
<?php
}
?>