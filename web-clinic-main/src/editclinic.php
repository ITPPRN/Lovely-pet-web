<?php
session_start();
if (!isset($_SESSION['token'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: ../index.php');
} else {
  $token = $_SESSION['token'];
  $hotelName1 = $_SESSION['hotelName'];
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
      'Authorization: Bearer ' . $token
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  $responseData = json_decode($response, true);
  $id = $responseData['id'];

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/get-hotel-by-id?id=' . $id . '',
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

  $response100 = curl_exec($curl);

  curl_close($curl);
  //echo $response;
  $response_array100 = json_decode($response100, true);
  $hotelName = $response_array100['hotelName'];
  $location = $response_array100['location'];
  $hotelTel = $response_array100['hotelTel'];
  $additionalNotes = $response_array100['additionalNotes'];
  $id_hotel = $response_array100['id'];


  //เอาชื่อภาพ
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/get-images-url',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
    "idHotel":' . $id_hotel . '
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
      CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/get-images',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{"name":"' . $img1 . '"}',
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
      CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/get-images',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{"name":"' . $img2 . '"}',
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
      CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/get-images',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{"name":"' . $img3 . '"}',
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="t1">
  <header>
    <?php include('./plugin/navbareditclinic.php'); 
    ?>
  </header>

  <main>
    <section class="container">
      <?php include('./plugin/editclinic.php'); ?>
    </section>
  </main>

</body>

</html>

<?php
// ตรวจสอบว่ามีการส่งข้อมูลผ่านแบบฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // รับค่าที่ส่งมาจากฟอร์ม
  $hotelName = $_POST['hotelName'];
  $location = $_POST['location'];
  $hotelTel = $_POST['hotelTel'];
  $additionalNotes = $_POST['additionalNotes'];

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/update-normal',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
      "hotelName":"' . $hotelName . '",
      "location":"' . $location . '",
        "hotelTel":"' . $hotelTel . '",
        "additionalNotes":"' . $additionalNotes . '"
  
  }',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $token
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  //echo $response;

  $apiEndpoint = 'https://backend-application.pcnone.com/hotel/upload-image';

  // ตรวจสอบว่ามีการส่งไฟล์รูปภาพหรือไม่
  if (isset($_FILES['image1']) && !empty($_FILES['image1']['name'])) {
    $file_name = $_FILES['image1']['name']; // ชื่อไฟล์
    $file_tmp = $_FILES['image1']['tmp_name']; // ชื่อชั่วคราวของไฟล์ที่อัปโหลด

    // กำหนดค่า POST data
    $post_data = array(
      'file' => new CURLFile($file_tmp, $_FILES['image1']['type'], $file_name),
      'id' => $id_hotel, // ค่า ID ที่ต้องการส่งไปยัง API
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
      'id' => $id_hotel, // ค่า ID ที่ต้องการส่งไปยัง API
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
      'id' => $id_hotel, // ค่า ID ที่ต้องการส่งไปยัง API
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
      title: "อัพเดทข้อมูลคลินิกสำเร็จ!",
      icon: "success"
    }).then((value) => {
      // ไปยังหน้า index.php
      window.location.href = "../editclinic.php";
    });
  </script>
<?php
}

?>