<?php


// ตรวจสอบว่ามี token ใน session หรือไม่
if (!isset($_SESSION['token'])) {
    // หากไม่มีให้ส่งข้อความว่า "Unauthorized" และ HTTP status code 401 Unauthorized
    http_response_code(401);
    echo json_encode(array("message" => "Unauthorized"));
    exit();
}

// รับค่า token จาก session
$token = $_SESSION['token'];

// เรียกใช้งาน cURL
$curl = curl_init();

// กำหนดค่าต่าง ๆ สำหรับการร้องขอ API
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://backend-application.pcnone.com/hotel/get-hotel-to-verify',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token // เพิ่ม token ใน header ของร้องขอ API
  ),
));

// ทำการร้องขอ API
$response = curl_exec($curl);

// ตรวจสอบว่ามีข้อมูลที่ได้รับจากการร้องขอ API หรือไม่
if ($response) {
    // ส่งข้อมูลที่ได้รับกลับเป็น JSON
    // echo $response;

} else {
    // หากไม่มีข้อมูลให้ส่งข้อความว่า "Internal Server Error" และ HTTP status code 500 Internal Server Error
    http_response_code(500);
    echo json_encode(array("message" => "Internal Server Error"));
}

// ปิดการใช้งาน cURL
curl_close($curl);
?>
